<?php
/**
 * Theme auto update
 *
 * @package justg
 */

class Velocity_AutoUpdate {

    public function autoload(){
        add_filter( 'site_transient_update_themes', array($this,'update_themes') );
    }
    
    private function fetch($item=null){
		global $wp_version;
        $data = [
            'key='.md5(date("dmY")),
            'item='.$item,
            'wp_version='.$wp_version,
            'site='.parse_url( get_site_url(), PHP_URL_HOST ),
        ];
        $url        = 'https://api.velocitydeveloper.id/?'.implode("&",$data);
        $response   = wp_remote_get( $url );
        $response   = !is_wp_error( $response ) ? json_decode( wp_remote_retrieve_body( $response ), true ) : [];
        
        if ( $response && isset($response['status']) && $response['status'] == 200) {
            return $response['result'];
        } else {
            return false;
        }
    }

    private function api($item=null,$cache=true){
        $item       = $item?$item:'theme';
        $cache_name = 'velocity_autoupdate_'.$item;
        $cache_api  = get_option( $cache_name, [] );

        //cek jika ada cache dan kurang dari 1 jam
        if ($cache && $cache_api && isset($cache_api['time']) && (time() < ($cache_api['time']+3600))) {
            $cache_api['result']['is_cache'] = 1;
            return $cache_api['result'];
        } else {
            $remote = $this->fetch($item);

            //update cache
            if($remote){                
                update_option($cache_name, [
                    'time'      => time(),
                    'result'    => $remote,
                ]);
            }
            $remote['is_cache'] = 0;
            return $remote;
        }
    }

    public function update_themes($transient){ 

        // get info theme
        $stylesheet = 'velocity';
        $version    = VELOCITY_SYSTEM_VERSION;

        ///remote API
        if (basename($_SERVER['PHP_SELF']) === 'themes.php') {
            $remote = $this->api('theme',false);
        } else {
            $remote = $this->api('theme');
        }
    
        // check all the versions now
        if( $remote && isset($remote['version']) && isset($transient->response) && !is_bool($transient->response) && $version < $remote['version'] ) {
    
            $data_theme = array(
                'theme'         => $stylesheet,
                'url'           => $remote['details_url'],
                'requires'      => $remote['requires'],
                'requires_php'  => $remote['requires_php'],
                'new_version'   => $remote['version'],
                'package'       => $remote['download_url'],
            );

            $transient->response[ $stylesheet ] = $data_theme;
    
        }
    
        return $transient;
    }

    public function tgm_plugin(){ 
        ///remote API
        if (basename($_SERVER['PHP_SELF']) === 'themes.php' && isset($_GET['page']) && $_GET['page'] == 'tgmpa-install-plugins') {
            $remote = $this->api('plugin',false);
        } else {
            $remote = $this->api('plugin');
        }
        return $remote;
    }

}

$autoUpdate = new Velocity_AutoUpdate;
$autoUpdate->autoload();