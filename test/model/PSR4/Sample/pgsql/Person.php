<?php
namespace xPDO\Test\Sample\pgsql;

use xPDO\xPDO;

class Person extends \xPDO\Test\Sample\Person
{

    public static $metaMap = array (
        'package' => 'xPDO\\Test\\Sample',
        'version' => '3.0',
        'table' => 'person',
        'extends' => 'xPDO\\Om\\xPDOSimpleObject',
        'fields' => 
        array (
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'date_modified' => 'CURRENT_TIMESTAMP',
            'dob' => NULL,
            'gender' => '',
            'blood_type' => NULL,
            'username' => NULL,
            'password' => '',
            'security_level' => 1,
        ),
        'fieldMeta' => 
        array (
            'first_name' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '100',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'last_name' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '100',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'middle_name' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '100',
                'phptype' => 'string',
                'null' => false,
                'default' => '',
            ),
            'date_modified' => 
            array (
                'dbtype' => 'timestamp',
                'phptype' => 'timestamp',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'attributes' => 'ON UPDATE CURRENT_TIMESTAMP',
            ),
            'dob' => 
            array (
                'dbtype' => 'date',
                'phptype' => 'date',
                'null' => true,
            ),
            'gender' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '1',
                'phptype' => 'string',
                'null' => false,
                'attributes' => 'CHECK ("gender" IN(\'\',\'M\',\'F\'))',
                'default' => '',
            ),
            'blood_type' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '100',
                'phptype' => 'string',
                'null' => true,
            ),
            'username' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '255',
                'phptype' => 'string',
                'null' => false,
                'index' => 'unique',
            ),
            'password' => 
            array (
                'dbtype' => 'varchar',
                'precision' => '255',
                'phptype' => 'password',
                'null' => false,
                'default' => '',
            ),
            'security_level' => 
            array (
                'dbtype' => 'smallint',
                'phptype' => 'integer',
                'null' => false,
                'default' => 1,
            ),
        ),
        'fieldAliases' => 
        array (
            'date_of_birth' => 'dob',
        ),
        'indexes' => 
        array (
            'username' => 
            array (
                'alias' => 'username',
                'primary' => false,
                'unique' => true,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'username' => 
                    array (
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
        ),
        'composites' => 
        array (
            'PersonPhone' => 
            array (
                'class' => 'xPDO\\Test\\Sample\\PersonPhone',
                'local' => 'id',
                'foreign' => 'person',
                'cardinality' => 'many',
                'owner' => 'local',
            ),
        ),
        'aggregates' => 
        array (
            'BloodType' => 
            array (
                'class' => 'xPDO\\Test\\Sample\\BloodType',
                'local' => 'blood_type',
                'foreign' => 'type',
                'cardinality' => 'one',
                'owner' => 'foreign',
            ),
        ),
        'validation' => 
        array (
            'class' => 'xPDO\\Validation\\xPDOValidator',
            'rules' => 
            array (
                'dob' => 
                array (
                    'date_format' => 
                    array (
                        'type' => 'preg_match',
                        'rule' => '/\\d{4}-\\d{2}-\\d{2}/',
                    ),
                ),
                'password' => 
                array (
                    'password_length' => 
                    array (
                        'type' => 'xPDOValidationRule',
                        'rule' => 'xPDOMinLengthValidationRule',
                        'value' => '6',
                    ),
                ),
            ),
        ),
    );
}
