modModal.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'modmodal-panel-home', renderTo: 'modmodal-panel-home-div'
		}]
	});
	modModal.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modModal.page.Home, MODx.Component);
Ext.reg('modmodal-page-home', modModal.page.Home);