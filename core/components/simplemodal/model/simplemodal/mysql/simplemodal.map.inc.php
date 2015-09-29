<?php
$xpdo_meta_map['simpleModal']= array (
  'package' => 'simplemodal',
  'version' => '1.1',
  'table' => 'simplemodal_modal',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'description' => '',
    'id_resource' => 0,
    'chunk' => '',
    'id_user' => 0,
    'id_group' => 0,
    'time_delay' => '',
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
    'id_resource' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'int',
      'null' => true,
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
    'id_user' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'int',
      'null' => true,
      'default' => 0,
    ),
    'id_group' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'int',
      'null' => true,
      'default' => 0,
    ),
    'time_delay' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'time_start' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'timestamp',
      'null' => true,
    ),
    'time_stop' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'timestamp',
      'null' => true,
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
