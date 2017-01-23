simpleModal.combo.Chunk = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'chunk'
        ,hiddenName: config.name || 'chunk'
        ,displayField: 'name'
        ,valueField: 'id'
        ,editable: true
        ,fields: ['id','name']
        ,pageSize: 20
        ,emptyText: _('simplemodal_combo_select')
        ,hideMode: 'offsets'
        ,url: MODx.config.connector_url
        ,baseParams: {
            action: 'element/chunk/getlist',
            combo: true
        }
    });
    simpleModal.combo.Chunk.superclass.constructor.call(this,config);
};
Ext.extend(simpleModal.combo.Chunk,MODx.combo.ComboBox);
Ext.reg('simplemodal-combo-chunk',simpleModal.combo.Chunk);



simpleModal.combo.Resource = function(config) {
    config = config || {};

    console.log(simpleModal.config.connector_url);
    Ext.applyIf(config,{
        name: 'resource'
        ,hiddenName: 'resource'
        ,displayField: 'pagetitle'
        ,multiSelectMode: true
        ,valueField: 'id'
        ,editable: true
        ,fields: ['id','pagetitle']
        ,pageSize: 20
        ,emptyText: _('simplemodal_combo_select')
        ,hideMode: 'offsets'
        ,url: simpleModal.config.connector_url
        ,baseParams: {
            action: 'mgr/resource/getlist'
        }
    });
    simpleModal.combo.Resource.superclass.constructor.call(this,config);
};
Ext.extend(simpleModal.combo.Resource,MODx.combo.ComboBox);
Ext.reg('simplemodal-combo-resource',simpleModal.combo.Resource);


simpleModal.combo.Users = function(config) {
    Ext.applyIf(config,{
        allowBlank:true,
        msgTarget: 'under',
        allowAddNewData: true,
        xtype:'superboxselect',
        resizable: true,
        name: 'users',
        anchor:'100%',
        triggerAction: 'all',
        store: new Ext.data.SimpleStore({
            fields: ['id', 'user'],
            data: [['1','Gropu1'],['2','Gropu2'],['3','Gropu3'],['4','Gropu4']]
        }),
        mode: 'local',
        displayField: 'user',
        valueField: 'id',
        value: '',
        extraItemCls: 'x-tag',
        listeners: {
            newitem: function(bs,v){
                var newObj = {
                    id: v,
                    group: v
                };
                bs.addItem(newObj);
            }
        }

    });
    simpleModal.combo.Users.superclass.constructor.call(this,config);
};
Ext.extend(simpleModal.combo.Users,Ext.ux.form.SuperBoxSelect);
Ext.reg('simplemodal-combo-users',simpleModal.combo.Users);


simpleModal.combo.Groups = function(config) {
    Ext.applyIf(config,{
        allowBlank:true,
        msgTarget: 'under',
        allowAddNewData: true,
        xtype:'superboxselect',
        resizable: true,
        name: 'groups',
        anchor:'100%',
        triggerAction: 'all',
        store: new Ext.data.SimpleStore({
            fields: ['id', 'group'],
            data: [['1','Gropu1'],['2','Gropu2'],['3','Gropu3'],['4','Gropu4']]
        }),
        mode: 'local',
        displayField: 'group',
        valueField: 'id',
        value: '',
        extraItemCls: 'x-tag',
        listeners: {
            newitem: function(bs,v){
                var newObj = {
                    id: v,
                    group: v
                };
                bs.addItem(newObj);
            }
        }

    });
    simpleModal.combo.Groups.superclass.constructor.call(this,config);
};
Ext.extend(simpleModal.combo.Groups,Ext.ux.form.SuperBoxSelect);
Ext.reg('simplemodal-combo-groups',simpleModal.combo.Groups);


//MODx.combo.Resources = function(config) {
//    config = config || {};
//    Ext.applyIf(config,{
//        name: 'resource'
//        ,hiddenName: 'resource'
//        ,displayField: 'pagetitle'
//        ,valueField: 'id'
//        ,editable: true
//        ,fields: ['id','pagetitle','parents']
//        ,pageSize: 10
//        ,emptyText: ''
//        ,url: MODx.config.connector_url
//        ,baseParams: {
//            action: 'mgr/resource/getlist'
//        }
//        ,forceSelection: false
//        ,tpl: new Ext.XTemplate(''
//            +'<tpl for="."><div class="x-combo-list-item simplemodal-resource-list-item">'
//            +'<tpl if="parents">'
//            +'<span class="parents">'
//            +'<tpl for="parents">'
//            +'<nobr><small>{pagetitle} / </small></nobr>'
//            +'</tpl>'
//            +'</span>'
//            +'</tpl>'
//            +'<span><tpl if="id"><sup><small>({id})</small></sup> </tpl><b>{pagetitle}</b></span>'
//            +'</div></tpl>',{
//            compiled: true
//        })
//        ,itemSelector: 'div.simplemodal-resource-list-item'
//    });
//    MODx.combo.Resources.superclass.constructor.call(this,config);
//};
//Ext.extend(MODx.combo.Resources,MODx.combo.ComboBox);
//Ext.reg('simplemodal-filter-resources',MODx.combo.Resources);
