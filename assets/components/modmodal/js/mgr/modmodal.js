var modModal = function (config) {
	config = config || {};
	modModal.superclass.constructor.call(this, config);
};
Ext.extend(modModal, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('modmodal', modModal);

modModal = new modModal();