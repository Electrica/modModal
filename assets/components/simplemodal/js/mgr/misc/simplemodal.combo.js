simpleModal.combo.Chunk = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'chunk'
        ,hiddenName: 'chunk'
        ,displayField: 'name'
        ,valueField: 'id'
        ,editable: true
        ,fields: ['id','name']
        ,pageSize: 20
        ,emptyText: _('simplemodal_combo_select')
        ,hideMode: 'offsets'
        ,url: simpleModal.config.connector_url
        ,baseParams: {
            action: 'element/chunk/getlist'
        }
    });
    simpleModal.combo.Chunk.superclass.constructor.call(this,config);
};
Ext.extend(simpleModal.combo.Chunk,MODx.combo.ComboBox);
Ext.reg('simplemodal-combo-chunk',simpleModal.combo.Chunk);


simpleModal.combo.Resource = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'resource'
        ,hiddenName: 'resource'
        ,displayField: 'pagetitle'
        ,valueField: 'id'
        ,editable: true
        ,fields: ['id','pagetitle']
        ,pageSize: 20
        ,emptyText: _('simplemodal_combo_select')
        ,hideMode: 'offsets'
        ,url: simpleModal.config.connector_url
        ,baseParams: {
            action: 'resource/getlist'
            ,combo: true
        }
    });
    simpleModal.combo.Resource.superclass.constructor.call(this,config);
};
Ext.extend(simpleModal.combo.Resource,MODx.combo.ComboBox);
Ext.reg('simplemodal-combo-resource',simpleModal.combo.Resource);