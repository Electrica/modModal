simplemodal.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'simplemodal-panel-home',
			renderTo: 'simplemodal-panel-home-div'
		}]
	});
	simplemodal.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(simplemodal.page.Home, MODx.Component);
Ext.reg('simplemodal-page-home', simplemodal.page.Home);