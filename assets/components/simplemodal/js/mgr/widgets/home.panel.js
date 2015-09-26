simplemodal.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'simplemodal-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('simplemodal') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('simplemodal_items'),
				layout: 'anchor',
				items: [{
					html: _('simplemodal_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'simplemodal-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	simplemodal.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(simplemodal.panel.Home, MODx.Panel);
Ext.reg('simplemodal-panel-home', simplemodal.panel.Home);
