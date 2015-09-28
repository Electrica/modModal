simpleModal.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'simplemodal-panel-home', renderTo: 'simplemodal-panel-home-div'
		}]
	});
	simpleModal.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(simpleModal.page.Home, MODx.Component);
Ext.reg('simplemodal-page-home', simpleModal.page.Home);