<?php

namespace App\Services;

use App\Models\AppCache;
use App\Models\AppSettings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

/**
 * Helper service to manage site's internal cache
 */
class SiteCache
{
    /**
     * Store the cache's time (in minutes) before it's marked as expired.
     * Defaults to 1 hour
     * @var int
     */
    private $cacheTtl = 60;

    /**
     * Class constructor
     */
    public function __construct()
    {
        if ( Schema::hasTable( 'app_settings' ) ) {
            $record = AppSettings::where( 'name', 'cache_ttl' )->first();
            if ( $record ) {
                $ttl = intval( $record->value );
                if ( !empty( $ttl ) && $ttl >= $this->cacheTtl ) {
                    $this->cacheTtl = $ttl;
                }
            }
        }
    }

    /**
     * Retrieve the stored value for the specified cache
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public function get( string $name, $default = null )
    {
        $record = AppCache::where( 'name', $name )->first();
        if ( $record ) {
            $lastUpdated = strtotime( $record->updated_at );
            $expireAt = ( $lastUpdated + ( $this->cacheTtl * 60 ) );
            //#! Cache is still valid
            if ( $expireAt >= time() ) {
                return maybe_unserialize( $record->value );
            }
        }
        return $default;
    }

    /**
     * Store a new cache entry or update if exists & not expired
     * @param string $name
     * @param string|null $content
     * @return Model|bool
     */
    public function store( string $name, ?string $content = null )
    {
        $record = AppCache::where( 'name', $name )->first();
        if ( !$record ) {
            return AppCache::create( [
                'name' => $name,
                'content' => maybe_serialize( $content ),
            ] );
        }
        $record->content = maybe_serialize( $content );
        return $record->save();
    }
}
