<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $fillable = [
        'name', 'slug', 'logo', 'description', 'website',
        'is_active', 'sort_order', 'category',
    ];

    protected $casts = ['is_active' => 'bool'];

    /**
     * Brand name → Simple Icons CDN slug.
     * https://simpleicons.org
     */
    public const ICON_SLUGS = [
        'Acer'                      => 'acer',
        'Apple'                     => 'apple',
        'ASUS'                      => 'asus',
        'Dell'                      => 'dell',
        'HP'                        => 'hp',
        'Intel'                     => 'intel',
        'Lenovo'                    => 'lenovo',
        'MSI'                       => 'msi',
        'Haier'                     => 'haier',
        'Hewlett Packard Enterprise' => 'hewlettpackardenterprise',
        'Epson'                     => 'epson',
        'Canon'                     => 'canon',
        'Brother'                   => 'brother',
        'Samsung'                   => 'samsung',
        'Ricoh'                     => 'ricoh',
        'IPEVO'                     => 'ipevo',
        'ViewSonic'                 => 'viewsonic',
        'BenQ'                      => 'benq',
        'Nokia'                     => 'nokia',
        'Sony'                      => 'sony',
        'Seagate'                   => 'seagate',
        'Western Digital'           => 'westerndigital',
        'SanDisk'                   => 'sandisk',
        'Kingston'                  => 'kingstontechnology',
        'Synology'                  => 'synology',
        'IBM'                       => 'ibm',
        'Linksys'                   => 'linksys',
        'D-Link'                    => 'dlink',
        'Cisco'                     => 'cisco',
        'Juniper'                   => 'junipernetworks',
        'Belden'                    => 'belden',
        'TP-Link'                   => 'tplink',
        'Fortinet'                  => 'fortinet',
        'Microsoft'                 => 'microsoft',
        'Trend Micro'               => 'trendmicro',
        'Adobe'                     => 'adobe',
        'CorelDRAW'                 => 'coreldraw',
        'ESET'                      => 'eset',
        'Autodesk'                  => 'autodesk',
        'LG'                        => 'lg',
        'APC'                       => 'apc',
        'Vertiv'                    => 'vertiv',
        'Eaton'                     => 'eaton',
        'Hikvision'                 => 'hikvision',
        'Dahua'                     => 'dahua',
        'Hisense'                   => 'hisense',
        'InFocus'                   => 'infocus',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Return the best available logo URL:
     *  1. Uploaded file (stored on disk)  → asset('storage/...')
     *  2. Absolute URL stored in `logo`   → used as-is
     *  3. Simple Icons CDN                → https://cdn.simpleicons.org/{slug}
     *  4. null                            → the view falls back to text
     */
    public function logoUrl(): ?string
    {
        if ($this->logo) {
            return str_starts_with($this->logo, 'http')
                ? $this->logo
                : asset('storage/'.$this->logo);
        }

        $slug = self::ICON_SLUGS[$this->name] ?? null;

        return $slug ? "https://cdn.simpleicons.org/{$slug}" : null;
    }
}