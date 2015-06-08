require.config({
    paths: {
        "jquery":"jquery"
    },
    shim: {
        "second-level-menu": ["jquery"]
    }
})

require(["second-level-menu", "only_photo", "need"]);