<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ParagonIE\CipherSweet\BlindIndex;
use ParagonIE\CipherSweet\EncryptedRow;
use Spatie\LaravelCipherSweet\Concerns\UsesCipherSweet;
use Spatie\LaravelCipherSweet\Contracts\CipherSweetEncrypted;

class Secrets extends Model implements CipherSweetEncrypted
{
    /** @use HasFactory<\Database\Factories\SecretsFactory> */
    use HasFactory, SoftDeletes, UsesCipherSweet;

    protected $table = 'secrets';

    protected $cast = [
        'user_id' => 'int',
        'team_id' => 'int',
        'team_role_id' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'team_id',
        'team_role_id',
        'name',
        'content',
    ];

    /**
     * Encrypted Fields
     *
     * Each column that should be encrypted should be added below. Each column
     * in the migration should be a `text` type to store the encrypted value.
     *
     * ```
     * ->addField('column_name')
     * ->addBooleanField('column_name')
     * ->addIntegerField('column_name')
     * ->addTextField('column_name')
     * ```
     *
     * Optional Fields
     *
     * These do not encrypt when NULL is provided as a value.
     * Instead, they become an unencrypted NULL.
     *
     * ```
     * ->addOptionalTextField('column_name')
     * ->addOptionalBooleanField('column_name')
     * ->addOptionalFloatField('column_name')
     * ->addOptionalIntegerField('column_name')
     * ```
     *
     * A JSON array can be encrypted as long as the key structure is defined in
     * a field map. See the docs for details on defining field maps.
     *
     * ```
     * ->addJsonField('column_name', $fieldMap)
     * ```
     *
     * Each field that should be searchable using an exact match needs to be
     * added as a blind index. Partial search is not supported. See the docs
     * for details on bit sizes and how to use compound indexes.
     *
     * ```
     * ->addBlindIndex('column_name', new BlindIndex('column_name_index'))
     * ```
     *
     * @see https://github.com/spatie/laravel-ciphersweet
     * @see https://ciphersweet.paragonie.com/
     * @see https://ciphersweet.paragonie.com/php/blind-index-planning
     * @see https://github.com/paragonie/ciphersweet/blob/master/src/EncryptedRow.php
     */
    public static function configureCipherSweet(EncryptedRow $encryptedRow): void
    {
        $encryptedRow
            ->addField('name')
            ->addField('content')
            ->addBlindIndex('name', new BlindIndex('name_index'))
            ->addBlindIndex('content', new BlindIndex('content_index'));
    }
}
