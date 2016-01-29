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
        fields: this.getFields(config),
        keys: []
        //keys: [{
        //	key: Ext.EventObject.ENTER, shift: true, fn: function () {
        //		this.submit()
        //	}, scope: this
        //}]
    });
    simpleModal.window.CreateItem.superclass.constructor.call(this, config);
    this.on('show', function () {
        this.fp.getForm().findField('type').fireEvent('select');
    }, this);
};
Ext.extend(simpleModal.window.CreateItem, MODx.Window, {

    tps: ['user', 'usergroup', 'all']

    , getFields: function (config) {

        var data = [];
        data.push(['user', _('simplemodal_create_user')]);
        data.push(['usergroup', _('simplemodal_create_usergroup')]);
        data.push(['all', _('simplemodal_create_all')]);

        var items = [{
            xtype: 'combo'
            , fieldLabel: _('simplemodal_recipient_type')
            , name: 'type'
            , hiddenName: 'type'
            , store: new Ext.data.SimpleStore({
                fields: ['type', 'disp']
                , data: data
            })
            , mode: 'local'
            , triggerAction: 'all'
            , displayField: 'disp'
            , valueField: 'type'
            , editable: false
            , value: data[0][0]
            , listeners: {
                'select': {fn: this.showRecipient, scope: this}
            }
            , anchor: '100%'
        }];

       items.push({
            xtype: 'modx-combo-user'
           , name: 'user'
            , id: 'mc-recipient-user'
            , fieldLabel: _('simplemodal_itessssm_user')
            , allowBlank: false
            , anchor: '100%'
        });

       items.push({
            xtype: 'modx-combo-usergroup'
           , name: 'group'
            , id: 'mc-recipient-usergroup'
            , fieldLabel: _('simplemodal_item_usergroup')
            , allowBlank: false
            , anchor: '100%'
        });

        items.push({
            xtype: 'hidden'
            , id: 'mc-recipient-all'
            , name: 'all'
            , fieldLabel: _('all')
            , value: 'all'
        });

       items.push({
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
                   id: config.id + '-time_delay',
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
                   id: config.id + '-coockie',
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
                   id: config.id + '-chunk',
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
                   id: config.id + '-resource',
                   anchor: '99%',
                   allowBlank: true,
                   editable: true
               }]
           }]
        },{
           //layout:'column'
           //,border: false
           //,anchor: '100%',
           //items: [{
           //    columnWidth: .5,
           //    layout: 'form'
           //    ,defaults: { msgTarget: 'under' }
           //    ,border:false,
           //    items: [{
           //        xtype: 'modx-combo-user',
           //        fieldLabel: _('simplemodal_item_user'),
           //        name: 'user',
           //        id: config.id + '-user',
           //        anchor: '99%',
           //        editable: true
           //    }]
           //},{
           //    columnWidth: .5
           //    ,layout: 'form'
           //    ,defaults: { msgTarget: 'under' }
           //    ,border:false,
           //    items: [{
           //        columnWidth: .5
           //        ,layout: 'form'
           //        ,defaults: { msgTarget: 'under' }
           //        ,border:false,
           //        items: [{
           //            xtype: 'modx-combo-usergroup',
           //            fieldLabel: _('simplemodal_item_usergroup'),
           //            name: 'group',
           //            id: config.id + '-group',
           //            anchor: '99%',
           //            editable: true
           //        }]
           //    }]
           //}]
        }, {
        	xtype: 'xcheckbox',
        	boxLabel: _('simplemodal_item_active'),
        	name: 'active',
        	id: config.id + '-active',
        	checked: true
        });

        return items;
    }

    , showRecipient: function (cb, rec, i) {
        var form = this.fp.getForm();
        for (var x = 0; x < this.tps.length; x++) {
            var f = form.findField('mc-recipient-' + this.tps[x]);
            if (f) {
                this.hideField(f);
            }
        }
        var type = rec ? rec.data.type : 'user';
        var fd = form.findField('mc-recipient-' + type);
        if (fd) {
            this.showField(fd);
        }
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