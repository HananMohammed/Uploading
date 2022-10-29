
## Image Uploader

## Technologies
<ul>
<li>Laravel 9  , PHP 8.1</li>
<li>Mysql</li>
<li>Vue js 3</li>
</ul>

Please follow the guide.

### Prerequisite
<ol>
<li>Make sure you have <a href="https://getcomposer.org/download/">composer</a>  installed.</li>
<li>Make sure you have latest stable version of <a href="https://nodejs.org/en/download/"> node </a> installed.</li>
</ol>
<ol>
    <pre style=" padding: 16px;overflow: auto;font-size: 85%;background-color: #f6f8fa ;border-radius: 6px;">
        <code>
            <li>git clone</li>
            <li>create a .env file copy content from .env.example and update the values</li>
            <li>composer install && composer update</li>
            <li>npm install</li>
            <li>php artisan migrate</li>
            <li>php artisan db:seed</li>
            <li>npm install && npm run dev</li>
            <li>php artisan key:gen</li>
            <li>Add These Lines to .env <ol><li>MIX_VUE_APP_ROOT_API="yourlocalhost/api/v1"</li><li>APP_CONFIG = {"nothrottle":true}</li><li>VUE_APP_I18N_LOCALE=en</li><li>FILESYSTEM_DRIVER=public</li><li>VUE_APP_STORE_SECURE=true</li></ol></li>
            <li>php artisan optimize:clear</li>
            <li>npm run watch</li>
            <li>php artisan serve</li>
        </code>
    </pre>
</ol>

### Architecture Concepts
- <a href="https://dbdesigner.page.link/LYhVPNasQvtCL1Z7A">Schema Shared LINK</a>

### Deployment
<ul>
</ul>


## License
