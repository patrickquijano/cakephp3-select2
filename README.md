# Select2 plugin for CakePHP 3

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require patrickquijano/cakephp3-select2:dev-master
```

Load the plugin by using the cake command:

```
$ bin/cake plugin load Select2
```

Load the plugin by adding the following statement in your project's src/Application.php:

```
public function bootstrap() {
    parent::bootstrap();
    $this->addPlugin('Select2');
}
```

Prior to 3.6.0:

```
Plugin::load('Select2');
```

## Usage

Load the helper:

```
namespace App\View;

use Cake\View\View;

class AppView extends View {

    public function initialize() {
        // other initialization here.
        $this->loadHelper('Select2.Select2');
        // other initialization here.
    }

}
```

Load the stylesheets and javascripts in your layouts using the helper:

```
<?= $this->Select2->css(); ?>
<?= $this->Select2->script(); ?>
```