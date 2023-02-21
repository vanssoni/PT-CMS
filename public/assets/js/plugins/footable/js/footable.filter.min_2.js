(function (t, e, undefined) {
    function a() {
        var e = this;
        e.name = "Footable Filter", e.init = function (a) {
            if (e.footable = a, a.options.filter.enabled === !0) {
                if (t(a.table).data("filter") === !1)return;
                a.timers.register("filter"), t(a.table).unbind(".filtering").bind({
                    "footable_initialized.filtering": function () {
                        var i = t(a.table), o = {
                            input: i.data("filter") || a.options.filter.input,
                            timeout: i.data("filter-timeout") || a.options.filter.timeout,
                            minimum: i.data("filter-minimum") || a.options.filter.minimum,
                            disableEnter: i.data("filter-disable-enter") || a.options.filter.disableEnter
                        };
                        o.disableEnter && t(o.input).keypress(function (t) {
                            return window.event ? 13 !== window.event.keyCode : 13 !== t.which
                        }), i.bind("footable_clear_filter", function () {
                            t(o.input).val(""), e.clearFilter()
                        }), i.bind("footable_filter", function (t, a) {
                            e.filter(a.filter)
                        }), t(o.input).keyup(function (i) {
                            a.timers.filter.stop(), 27 === i.which && t(o.input).val(""), a.timers.filter.start(function () {
                                var a = t(o.input).val() || "";
                                e.filter(a)
                            }, o.timeout)
                        })
                    }, "footable_redrawn.filtering": function () {
                        var i = t(a.table), o = i.data("filter-string");
                        o && e.filter(o)
                    }
                }).data("footable-filter", e)
            }
        }, e.filter = function (a) {
            var i = e.footable, o = t(i.table), n = o.data("filter-minimum") || i.options.filter.minimum, r = !a, l = i.raise("footable_filtering", {
                filter: a,
                clear: r
            });
            if (!(l && l.result === !1 || l.filter && n > l.filter.length))if (l.clear)e.clearFilter(); else {
                var d = l.filter.split(" ");
                o.find("> tbody > tr").hide().addClass("footable-filtered");
                var s = o.find("> tbody > tr:not(.footable-row-detail)");
                t.each(d, function (t, e) {
                    e && e.length > 0 && (o.data("current-filter", e), s = s.filter(i.options.filter.filterFunction))
                }), s.each(function () {
                    e.showRow(this, i), t(this).removeClass("footable-filtered")
                }), o.data("filter-string", l.filter), i.raise("footable_filtered", {filter: l.filter, clear: !1})
            }
        }, e.clearFilter = function () {
            var a = e.footable, i = t(a.table);
            i.find("> tbody > tr:not(.footable-row-detail)").removeClass("footable-filtered").each(function () {
                e.showRow(this, a)
            }), i.removeData("filter-string"), a.raise("footable_filtered", {clear: !0})
        }, e.showRow = function (e, a) {
            var i = t(e), o = i.next(), n = t(a.table);
            i.is(":visible") || (n.hasClass("breakpoint") && i.hasClass("footable-detail-show") && o.hasClass("footable-row-detail") ? (i.add(o).show(), a.createOrUpdateDetailRow(e)) : i.show())
        }
    }

    if (e.footable === undefined || null === e.footable)throw Error("Please check and make sure footable.js is included in the page and is loaded prior to this script.");
    var i = {
        filter: {
            enabled: !0,
            input: ".footable-filter",
            timeout: 300,
            minimum: 2,
            disableEnter: !1,
            filterFunction: function () {
                var e = t(this), a = e.parents("table:first"), i = a.data("current-filter").toUpperCase(), o = e.find("td").text();
                return a.data("filter-text-only") || e.find("td[data-value]").each(function () {
                    o += t(this).data("value")
                }), o.toUpperCase().indexOf(i) >= 0
            }
        }
    };
    e.footable.plugins.register(a, i)
})(jQuery, window);