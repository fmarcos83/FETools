Ext tools
=========

set of tools to make several tasks related with fe development

depends on ZF

Tools
------

- generate
    ::

        generates mock data into several formats options: r,v,n[,l]

        - r indicates root for the data and filename where is going
            to be stored

        - v comma separated values that indicate param names

        - n number of records to store in the data container

        - l [optional] landing area where is going to be stored the data
            container

Todo
-----

- support for more formats than json (xml)

- comma separated values must indicate data type with :
  e.g {param_name:param_type}

- support for as many seeders as param_types


- refactor generator with command line class

- create tests

- add project in travis
