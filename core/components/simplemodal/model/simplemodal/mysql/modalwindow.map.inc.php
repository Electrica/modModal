<?php
$xpdo_meta_map['modalWindow']= array (
  'package' => 'simplemodal',
  'version' => '1.1',
  'table' => 'simplemodal_modal',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'description' => '',
    'resource' => 0,
    'chunk' => '',
    'user' => 0,
    'group' => 0,
    'time_delay' => 60,
    'coockie' => 3600,
    'time_start' => NULL,
    'time_stop' => NULL,
    'active' => 1,
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'text',
      'null' => true,
      'default' => '',
    ),
    'resource' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'null' => false,
      'default' => 0,
    ),
    'chunk' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'user' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'int',
      'null' => false,
      'default' => 0,
    ),
    'group' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'int',
      'null' => false,
      'default' => 0,
    ),
    'time_delay' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'int',
      'null' => false,
      'default' => 60,
    ),
    'coockie' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'int',
      'null' => false,
      'default' => 3600,
    ),
    'time_start' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'timestamp',
      'null' => false,
    ),
    'time_stop' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'timestamp',
      'null' => false,
    ),
    'active' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'null' => true,
      'default' => 1,
    ),
  ),
  'indexes' => 
  array (
    'name' => 
    array (
      'alias' => 'name',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'name' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'active' => 
    array (
      'alias' => 'active',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'active' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
