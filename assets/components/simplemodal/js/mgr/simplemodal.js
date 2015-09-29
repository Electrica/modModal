var simpleModal = function (config) {
	config = config || {};
	simpleModal.superclass.constructor.call(this, config);
};
Ext.extend(simpleModal, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('simplemodal', simpleModal);

simpleModal = new simpleModal();