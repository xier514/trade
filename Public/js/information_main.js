require.config({
    paths : {
        "jquery":"jquery"
    },
    shim: {
        "info_placeholder":  ["jquery"],
        "info_submit":  ["jquery"]
    }
})

require(["info_placeholder","info_submit"])