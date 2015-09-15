modModal.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'modmodal-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('modmodal') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('modmodal_items'),
				layout: 'anchor',
				items: [{
					html: _('modmodal_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'modmodal-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	modModal.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(modModal.panel.Home, MODx.Panel);
Ext.reg('modmodal-panel-home', modModal.panel.Home);
