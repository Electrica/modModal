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


//simpleModal.combo.Resource = function(config) {
//    config = config || {};
//    Ext.applyIf(config,{
//        name: 'resource'
//        ,hiddenName: 'resource'
//        ,displayField: 'pagetitle'
//        ,valueField: 'id'
//        ,editable: true
//        ,fields: ['id','pagetitle']
//        ,pageSize: 20
//        ,emptyText: _('simplemodal_combo_select')
//        ,hideMode: 'offsets'
//        ,url: MODx.config.connector_url
//        ,baseParams: {
//            action: 'mgr/resource/getlist'
//            ,combo: 1
//        }
//    });
//    simpleModal.combo.Resource.superclass.constructor.call(this,config);
//};
//Ext.extend(simpleModal.combo.Resource,MODx.combo.ComboBox);
//Ext.reg('simplemodal-combo-resource',simpleModal.combo.Resource);


MODx.combo.Resources = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'resource'
        ,hiddenName: 'resource'
        ,displayField: 'pagetitle'
        ,valueField: 'id'
        ,editable: true
        ,fields: ['id','pagetitle','parents']
        ,pageSize: 10
        ,emptyText: ''
        ,url: MODx.config.connector_url
        ,baseParams: {
            action: 'mgr/resource/getlist'
        }
        ,forceSelection: false
        ,tpl: new Ext.XTemplate(''
            +'<tpl for="."><div class="x-combo-list-item simplemodal-resource-list-item">'
            +'<tpl if="parents">'
            +'<span class="parents">'
            +'<tpl for="parents">'
            +'<nobr><small>{pagetitle} / </small></nobr>'
            +'</tpl>'
            +'</span>'
            +'</tpl>'
            +'<span><tpl if="id"><sup><small>({id})</small></sup> </tpl><b>{pagetitle}</b></span>'
            +'</div></tpl>',{
            compiled: true
        })
        ,itemSelector: 'div.simplemodal-resource-list-item'
    });
    MODx.combo.Resources.superclass.constructor.call(this,config);
};
Ext.extend(MODx.combo.Resources,MODx.combo.ComboBox);
Ext.reg('simplemodal-filter-resources',MODx.combo.Resources);
