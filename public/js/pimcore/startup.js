pimcore.registerNS("pimcore.plugin.StarfruitMaintenanceBundle");

pimcore.plugin.StarfruitMaintenanceBundle = Class.create({

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("StarfruitMaintenanceBundle ready!");
    }
});

var StarfruitMaintenanceBundlePlugin = new pimcore.plugin.StarfruitMaintenanceBundle();
