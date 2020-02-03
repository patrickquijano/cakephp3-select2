<?php

namespace Select2\View\Helper;

use Cake\Core\Configure;
use Cake\Utility\Hash;
use Cake\View\Helper;

/**
 * Select2 helper
 */
class Select2Helper extends Helper {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'css' => [
            'url' => 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css',
            'integrity' => 'sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=',
            'bootstrap4' => [
                'url' => 'https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css',
                'integrity' => 'sha256-ufgBrsh/MaI1q/Pw4E8Osv+4oo2a7Z6lfeF42WpjVa4=',
            ],
        ],
        'script' => [
            'url' => 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js',
            'integrity' => 'sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=',
        ],
    ];

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * Creates a link element for Select2 CSS stylesheet.
     *
     * ### Usage
     *
     * Add the stylesheet to view block "css":
     *
     * ```
     * $this->Html->css(['block' => true]);
     * ```
     *
     * Add the stylesheet to a custom block:
     *
     * ```
     * $this->Html->css(['block' => 'layoutCss']);
     * ```
     *
     * ### Options
     *
     * - `block` Set to true to append output to view block "css" or provide
     *   custom block name.
     * - `plugin` False value will prevent parsing path as a plugin
     * - `rel` Defaults to 'stylesheet'. If equal to 'import' the stylesheet will be imported.
     * - `fullBase` If true the URL will get a full address for the css file.
     *
     * @param array $options Array of options and HTML arguments.
     * @return string|null CSS `<link />` or `<style />` tag, depending on the type of link.
     */
    public function css(array $options = []) {
        if (!isset($options['block'])) {
            $options['block'] = false;
        }
        $options['once'] = true;
        if (Configure::read('debug')) {
            $out = '';
            $out .= $this->Html->css('Select2.select2.min', $options);
            if (isset($options['theme'])) {
                if ($options['theme'] === 'bootstrap4') {
                    $out .= $this->Html->css('Select2.select2-bootstrap4.min', $options);
                }
                unset($options['theme']);
            }
            return $out;
        } else {
            $out = '';
            $out .= $this->Html->css($this->getConfig('css.url'), Hash::merge($options, [
                    'integrity' => $this->getConfig('css.integrity'),
                    'crossorigin' => 'anonymous',
            ]));
            if (isset($options['theme'])) {
                $out .= $this->Html->css($this->getConfig('css.' . $options['theme'] . '.url'), Hash::merge($options, [
                        'integrity' => $this->getConfig('css.' . $options['theme'] . '.integrity'),
                        'crossorigin' => 'anonymous',
                ]));
                unset($options['theme']);
            }
            return $out;
        }
    }

    /**
     * Returns Select2 `<script>` tag.
     *
     * ### Usage
     *
     * Add the script file to a custom block:
     *
     * ```
     * $this->Html->script(['block' => 'bodyScript']);
     * ```
     *
     * ### Options
     *
     * - `block` Set to true to append output to view block "script" or provide
     *   custom block name.
     * - `plugin` False value will prevent parsing path as a plugin
     * - `fullBase` If true the url will get a full address for the script file.
     *
     * @param string|string[] $url String or array of javascript files to include
     * @param array $options Array of options, and html attributes see above.
     * @return string|null String of `<script />` tags or null if block is specified in options
     *   or if $once is true and the file has been included before.
     */
    public function script(array $options = []) {
        if (!isset($options['block'])) {
            $options['block'] = false;
        }
        $options['once'] = true;
        if (Configure::read('debug')) {
            return $this->Html->script('Select2.select2.min', $options);
        } else {
            $options = Hash::merge($options, [
                    'integrity' => $this->getConfig('script.integrity'),
                    'crossorigin' => 'anonymous',
            ]);
            return $this->Html->script($this->getConfig('script.url'), $options);
        }
    }

}
