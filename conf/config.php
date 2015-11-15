<?php

return array(
    // PsySH data directory.
    'dataDir' => '/data/'.getenv('PHP_MANUAL_LANGUAGE'),

    // PsySH configuration directory.
    'configDir' => '/config',

    // Sets the maximum number of entries the history can contain.
    // If set to zero, the history size is unlimited.
    'historySize' => getenv('PSYSH_HISTORY_SIZE'),

    // If set to true, the history will not keep duplicate entries.
    // Newest entries override oldest.
    // This is the equivalent of the HISTCONTROL=erasedups setting in bash.
    'eraseDuplicates' => (getenv('PSYSH_ERASE_DUPLICATES') == 'false') ? false : (bool)getenv('PSYSH_ERASE_DUPLICATES'),

    // By default, PsySH will use a 'forking' execution loop if pcntl is
    // installed. This is by far the best way to use it, but you can override
    // the default by explicitly enabling or disabling this functionality here.
    'usePcntl' => (getenv('PSYSH_USE_PCNTL') == 'false') ? false : (bool)getenv('PSYSH_USE_PCNTL'),

    // PsySH uses readline if you have it installed, because interactive input
    // is pretty awful without it. But you can explicitly disable it if you hate
    // yourself or something.
    'useReadline' => (getenv('PSYSH_USE_READLINE') == 'false') ? false : (bool)getenv('PSYSH_USE_READLINE'),

    // PsySH automatically inserts semicolons at the end of input if a statement
    // is missing one. To disable this, set `requireSemicolons` to true.
    'requireSemicolons' => (getenv('PSYSH_REQUIRE_SEMICOLONS') == 'false') ? false : (bool)getenv('PSYSH_REQUIRE_SEMICOLONS'),

    // You can disable tab completion if you want to. Not sure why you'd want to.
    'tabCompletion' => (getenv('PSYSH_TAB_COMPLETION') == 'false') ? false : (bool)getenv('PSYSH_TAB_COMPLETION'),

    // If multiple versions of the same configuration or data file exist, PsySH will
    // use the file with highest precedence, and will silently ignore all others. With
    // this enabled, a warning will be emitted (but not an exception thrown) if multiple
    // configuration or data files are found.
    //
    // This will default to true in a future release, but is false for now.
    'warnOnMultipleConfigs' => (getenv('PSYSH_WARN_ON_MULTIPLE_CONFIGS') == 'false') ? false : (bool)getenv('PSYSH_WARN_ON_MULTIPLE_CONFIGS'),
);
