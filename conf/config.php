<?php


namespace Psy\Docker {
    /**
     * @param  string $variable
     * @param  mixed  $default
     *
     * @return mixed
     */
    function env($variable, $default = null) {
        $value = getenv($variable);

        if ($value) {
            switch (strtolower($value)) {
                case 'true':
                    $value = true;
                    break;

                case 'false':
                    $value = false;
                    break;

                case 'null':
                    $value = null;
                    break;
            }

            return $value;
        }

        return $default;
    }
}

namespace {
    return array(
        // PsySH data directory.
        'dataDir' => '/data/'.Psy\Docker\env('PSYSH_MANUAL_LANGUAGE', 'en'),

        // PsySH configuration directory.
        'configDir' => '/config',

        // Sets the maximum number of entries the history can contain.
        // If set to zero, the history size is unlimited.
        'historySize' => (int)Psy\Docker\env('PSYSH_HISTORY_SIZE', 0),

        // If set to true, the history will not keep duplicate entries.
        // Newest entries override oldest.
        // This is the equivalent of the HISTCONTROL=erasedups setting in bash.
        'eraseDuplicates' => Psy\Docker\env('PSYSH_ERASE_DUPLICATES', true),

        // By default, PsySH will use a 'forking' execution loop if pcntl is
        // installed. This is by far the best way to use it, but you can override
        // the default by explicitly enabling or disabling this functionality here.
        'usePcntl' => Psy\Docker\env('PSYSH_USE_PCNTL', true),

        // PsySH uses readline if you have it installed, because interactive input
        // is pretty awful without it. But you can explicitly disable it if you hate
        // yourself or something.
        'useReadline' => Psy\Docker\env('PSYSH_USE_READLINE', true),

        // PsySH automatically inserts semicolons at the end of input if a statement
        // is missing one. To disable this, set `requireSemicolons` to true.
        'requireSemicolons' => Psy\Docker\env('PSYSH_REQUIRE_SEMICOLONS', false),

        // You can disable tab completion if you want to. Not sure why you'd want to.
        'tabCompletion' => Psy\Docker\env('PSYSH_TAB_COMPLETION', true),

        // If multiple versions of the same configuration or data file exist, PsySH will
        // use the file with highest precedence, and will silently ignore all others. With
        // this enabled, a warning will be emitted (but not an exception thrown) if multiple
        // configuration or data files are found.
        //
        // This will default to true in a future release, but is false for now.
        'warnOnMultipleConfigs' => Psy\Docker\env('PSYSH_WARN_ON_MULTIPLE_CONFIGS', false),
    );
}
