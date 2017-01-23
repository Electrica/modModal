simpleModal.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'simplemodal-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('simplemodal_item_create'),
        width: 550,
        autoHeight: true,
        url: simpleModal.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(),
        keys: []
        //keys: [{
        //	key: Ext.EventObject.ENTER, shift: true, fn: function () {
        //		this.submit()
        //	}, scope: this
        //}]
    });
    simpleModal.window.CreateItem.superclass.constructor.call(this, config);
};

Ext.extend(simpleModal.window.CreateItem, MODx.Window, {

    getFields: function () {

       return [{
        	xtype: 'textfield',
        	fieldLabel: _('simplemodal_item_name'),
        	name: 'name',
        	//id: config.id + '-name',
        	anchor: '99%',
        	allowBlank: false
        }, {
        	xtype: 'textarea',
        	fieldLabel: _('simplemodal_item_description'),
        	name: 'description',
        	//id: config.id + '-description',
        	height: 150,
        	anchor: '99%'
        },{
           layout: 'column',
           border: false,
           anchor: '100%',
           items: [{
               columnWidth: .5,
               layout: 'form',
               defaults: {msTarget: 'under'},
               border: false,
               items: [{
                   xtype: 'textfield',
                   fieldLabel: _('simplemodal_item_time_delay'),
                   name: 'time_delay',
                   //id: config.id + '-time_delay',
                   anchor: '99%'
               }]
           },{
               columnWidth: .5,
               layout: 'form',
               defaults: {msTarget: 'under'},
               border: false,
               items: [{
                   xtype: 'textfield',
                   fieldLabel: _('simplemodal_item_coockie'),
                   name: 'coockie',
                   //id: config.id + '-coockie',
                   anchor: '99%'
               }]
           }]
        },{
           layout:'column'
           ,border: false
           ,anchor: '100%',
           items: [{
               columnWidth: .5
               ,layout: 'form'
               ,defaults: { msgTarget: 'under' }
               ,border:false,
               items: [{
                   xtype: 'textfield',
                   fieldLabel: _('simplemodal_item_chunk'),
                   name: 'chunk',
                   //id: config.id + '-chunk',
                   anchor: '99%',
                   allowBlank: true,
                   editable: true
               }]
           },{
               columnWidth: .5
               ,layout: 'form'
               ,defaults: { msgTarget: 'under' }
               ,border:false,
               items: [{
                   xtype: 'textfield',
                   fieldLabel: _('simplemodal_item_resource'),
                   name: 'resource',
                   //id: config.id + '-resource',
                   anchor: '99%',
                   allowBlank: true,
                   editable: true
               }]
           }]
        }, {
           layout: 'column'
           , border: false
           , anchor: '100%',
           items: [{
               columnWidth: .5,
               layout: 'form'
               , defaults: {msgTarget: 'under'}
               , border: false,
               items: [{
                   //xtype: 'modx-combo-user',
                   xtype: 'modx-combo-user',
                   fieldLabel: _('simplemodal_item_user'),
                   name: 'user',
                   editable: true,
                   anchor: '99%',
                   renderTo: Ext.getBody()
               }]
           }, {
               columnWidth: .5
               , layout: 'form'
               , defaults: {msgTarget: 'under'}
               , border: false,
               items: [{
                   columnWidth: .5
                   , layout: 'form'
                   , defaults: {msgTarget: 'under'}
                   , border: false,
                   items: [{
                       xtype: 'modx-combo-usergroup',
                       fieldLabel: _('simplemodal_item_usergroup'),
                       name: 'group',
                       anchor: '99%',
                       editable: true
                   }]
               }]
           }]
       },{
        	xtype: 'xcheckbox',
        	boxLabel: _('simplemodal_item_active'),
        	name: 'active',
        	//id: config.id + '-active',
        	checked: true
        }];

    }

});
Ext.reg('simplemodal-item-window-create', simpleModal.window.CreateItem);


simpleModal.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'simplemodal-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('simplemodal_item_update'),
        width: 550,
        autoHeight: true,
        url: simpleModal.config.connector_url,
        action: 'mgr/item/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    simpleModal.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(simpleModal.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('simplemodal_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('simplemodal_item_description'),
            name: 'description',
            id: config.id + '-description',
            height: 150,
            anchor: '99%'
        }, {
            layout: 'column',
            border: false,
            anchor: '100%',
            items: [{
                columnWidth: .5,
                layout: 'form',
                defaults: {msTarget: 'under'},
                border: false,
                items: [{
                    xtype: 'textfield',
                    fieldLabel: _('simplemodal_item_time_delay'),
                    name: 'time_delay',
                    id: config.id + '-time_delay',
                    anchor: '99%'
                }]
            }, {
                columnWidth: .5,
                layout: 'form',
                defaults: {msTarget: 'under'},
                border: false,
                items: [{
                    xtype: 'textfield',
                    fieldLabel: _('simplemodal_item_coockie'),
                    name: 'coockie',
                    id: config.id + '-coockie',
                    anchor: '99%'
                }]
            }]
        }, {
            layout: 'column'
            , border: false
            , anchor: '100%',
            items: [{
                columnWidth: .5
                , layout: 'form'
                , defaults: {msgTarget: 'under'}
                , border: false,
                items: [{
                    xtype: 'textfield',
                    fieldLabel: _('simplemodal_item_chunk'),
                    name: 'chunk',
                    id: config.id + '-chunk',
                    anchor: '99%',
                    allowBlank: true
                }]
            }, {
                columnWidth: .5
                , layout: 'form'
                , defaults: {msgTarget: 'under'}
                , border: false,
                items: [{
                    xtype: 'textfield',
                    fieldLabel: _('simplemodal_item_resource'),
                    name: 'resource',
                    id: config.id + '-resource',
                    anchor: '99%',
                    editable: true,
                    allowBlank: true
                }]
            }]
        }, {
            layout: 'column'
            , border: false
            , anchor: '100%',
            items: [{
                columnWidth: .5,
                layout: 'form'
                , defaults: {msgTarget: 'under'}
                , border: false,
                items: [{
                    xtype: 'modx-combo-user',
                    fieldLabel: _('simplemodal_item_user'),
                    name: 'user',
                    editable: true,
                    id: config.id + '-user',
                    anchor: '99%'
                }]
            }, {
                columnWidth: .5
                , layout: 'form'
                , defaults: {msgTarget: 'under'}
                , border: false,
                items: [{
                    columnWidth: .5
                    , layout: 'form'
                    , defaults: {msgTarget: 'under'}
                    , border: false,
                    items: [{
                        xtype: 'modx-combo-usergroup',
                        fieldLabel: _('simplemodal_item_usergroup'),
                        name: 'group',
                        id: config.id + '-group',
                        anchor: '99%',
                        editable: true,
                    }]
                }]
            }]
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('simplemodal_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    }

});
Ext.reg('simplemodal-item-window-update', simpleModal.window.UpdateItem);