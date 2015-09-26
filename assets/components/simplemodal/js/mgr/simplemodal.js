var simplemodal = function (config) {
	config = config || {};
	simplemodal.superclass.constructor.call(this, config);
};
Ext.extend(simplemodal, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('simplemodal', simplemodal);

simplemodal = new simplemodal();