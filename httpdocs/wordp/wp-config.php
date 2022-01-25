<?php
/**
 * WordPress için başlangıç ayar dosyası.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * Bu dosya şu ayarları içerir:
 * 
 * * MySQL ayarları
 * * Gizli anahtarlar
 * * Veritabanı tablo ön eki
 * * ABSPATH
 * 
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri servis sağlayıcınızdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'wp' );

/** MySQL veritabanı kullanıcısı */
define( 'DB_USER', 'root' );

/** MySQL veritabanı parolası */
define( 'DB_PASSWORD', '' );

/** MySQL sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define( 'DB_COLLATE', '' );

/**#@+
 * Eşsiz doğrulama anahtarları ve tuzlar.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h6[jgX4!Z2[4H?&JSo[CN1k$FA2 |;={H81D]4/,/Q3E7fyloWikao6K..~vGotY' );
define( 'SECURE_AUTH_KEY',  'r2&=Ix[WTwwN1xS*{5E$nJUNF0hrt* 05V2s;K{qF:XqFfID;s28L&PsXO6~-*iD' );
define( 'LOGGED_IN_KEY',    'rJeO]JUh%B<Q_d 1E]KO KC/SW@cBR&bCSiql5Ik/YpU(Y2Mj.Q6;b@lLc G#sFH' );
define( 'NONCE_KEY',        '^15nv^w%L!j#Y;3 &6y6OJ- 8EXg9p`=+5?$PK:B-Oy!_&Dc^Hx*oV**ZcWky6Wa' );
define( 'AUTH_SALT',        'T>HTu% kQ[LErzyP~Hhk-ibugJgxrC!/-#,! {#,ciZ6ffY*DO(V8f]71b#uY5 {' );
define( 'SECURE_AUTH_SALT', '=Edg;++G:Uc_3E8~MIE$g#7$RhOI5hIs+vomRbUFdBqS3P|GJs)<Pr<f?3TRbz#3' );
define( 'LOGGED_IN_SALT',   'XWP{*9LI%g(@a>ZZw9w%BpS=Kq67{+2aIOhr)j_hWZ09)s:JaP!l$r&/Ye|cz%DC' );
define( 'NONCE_SALT',       'wH/d%_.l/PL8$g}fb&R/bMX(LaZ.In[n6(^=FLwRSw7CohG^|rt)Q;^2[w!Ncf,)' );

/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 * 
 * Hata ayıklama için kullanabilecek diğer sabitler ile ilgili daha fazla bilgiyi
 * belgelerden edinebilirsiniz.
 * 
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** WordPress değişkenlerini ve yollarını kurar. */
require_once ABSPATH . 'wp-settings.php';