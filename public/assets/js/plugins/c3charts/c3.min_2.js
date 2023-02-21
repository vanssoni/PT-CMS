!function (a) {
    "use strict";
    function b(a) {
        var b = this.internal = new c(this);
        b.loadConfig(a), b.init(), function d(a, b, c) {
            Object.keys(a).forEach(function (e) {
                b[e] = a[e].bind(c), Object.keys(a[e]).length > 0 && d(a[e], b[e], c)
            })
        }(e, this, this)
    }

    function c(b) {
        var c = this;
        c.d3 = a.d3 ? a.d3 : "undefined" != typeof require ? require("d3") : void 0, c.api = b, c.config = c.getDefaultConfig(), c.data = {}, c.cache = {}, c.axes = {}
    }

    function d(a, b) {
        function c(a, b) {
            a.attr("transform", function (a) {
                return "translate(" + Math.ceil(b(a) + t) + ", 0)"
            })
        }

        function d(a, b) {
            a.attr("transform", function (a) {
                return "translate(0," + Math.ceil(b(a)) + ")"
            })
        }

        function e(a) {
            var b = a[0], c = a[a.length - 1];
            return c > b ? [b, c] : [c, b]
        }

        function f(a) {
            var b, c, d = [];
            if (a.ticks)return a.ticks.apply(a, m);
            for (c = a.domain(), b = Math.ceil(c[0]); b < c[1]; b++)d.push(b);
            return d.length > 0 && d[0] > 0 && d.unshift(d[0] - (d[1] - d[0])), d
        }

        function g() {
            var a, c = o.copy();
            return b.isCategory && (a = o.domain(), c.domain([a[0], a[1] - 1])), c
        }

        function h(a) {
            return l ? l(a) : a
        }

        function i(a) {
            if (w)return w;
            var b = {h: 11.5, w: 5.5};
            return a.select("text").text(h).each(function (a) {
                var c = this.getBoundingClientRect(), d = h(a), e = c.height, f = d ? c.width / d.length : void 0;
                e && f && (b.h = e, b.w = f)
            }).text(""), w = b, b
        }

        function j(j) {
            j.each(function () {
                function j(a, c) {
                    function d(a, b) {
                        f = void 0;
                        for (var h = 1; h < b.length; h++)if (" " === b.charAt(h) && (f = h), e = b.substr(0, h + 1), g = O.w * e.length, g > c)return d(a.concat(b.substr(0, f ? f : h)), b.slice(f ? f + 1 : h));
                        return a.concat(b)
                    }

                    var e, f, g, i = h(a), j = [];
                    return "[object Array]" === Object.prototype.toString.call(i) ? i : ((!c || 0 >= c) && (c = R ? 95 : b.isCategory ? Math.ceil(z(A[1]) - z(A[0])) - 12 : 110), d(j, i + ""))
                }

                function l(a, b) {
                    var c = O.h;
                    return 0 === b && (c = "left" === p || "right" === p ? -((P[a.index] - 1) * (O.h / 2) - 3) : ".71em"), c
                }

                function m(a) {
                    var b = o(a) + (n ? 0 : t);
                    return F[0] < b && b < F[1] ? q : 0
                }

                var u, v, w, x = a.select(this), y = this.__chart__ || o, z = this.__chart__ = g(), A = s ? s : f(z), B = x.selectAll(".tick").data(A, z), C = B.enter().insert("g", ".domain").attr("class", "tick").style("opacity", 1e-6), D = B.exit().remove(), E = a.transition(B).style("opacity", 1), F = o.rangeExtent ? o.rangeExtent() : e(o.range()), G = x.selectAll(".domain").data([0]), H = (G.enter().append("path").attr("class", "domain"), a.transition(G));
                C.append("line"), C.append("text");
                var I = C.select("line"), J = E.select("line"), K = C.select("text"), L = E.select("text");
                b.isCategory ? (t = Math.ceil((z(1) - z(0)) / 2), v = n ? 0 : t, w = n ? t : 0) : t = v = 0;
                var M, N, O = i(x.select(".tick")), P = [], Q = Math.max(q, 0) + r, R = "left" === p || "right" === p;
                switch (M = B.select("text"), N = M.selectAll("tspan").data(function (a, c) {
                    var d = b.tickMultiline ? j(a, b.tickWidth) : [].concat(h(a));
                    return P[c] = d.length, d.map(function (a) {
                        return {index: c, splitted: a}
                    })
                }), N.enter().append("tspan"), N.exit().remove(), N.text(function (a) {
                    return a.splitted
                }), p) {
                    case"bottom":
                        u = c, I.attr("y2", q), K.attr("y", Q), J.attr("x1", v).attr("x2", v).attr("y2", m), L.attr("x", 0).attr("y", Q), M.style("text-anchor", "middle"), N.attr("x", 0).attr("dy", l), H.attr("d", "M" + F[0] + "," + k + "V0H" + F[1] + "V" + k);
                        break;
                    case"top":
                        u = c, I.attr("y2", -q), K.attr("y", -Q), J.attr("x2", 0).attr("y2", -q), L.attr("x", 0).attr("y", -Q), M.style("text-anchor", "middle"), N.attr("x", 0).attr("dy", "0em"), H.attr("d", "M" + F[0] + "," + -k + "V0H" + F[1] + "V" + -k);
                        break;
                    case"left":
                        u = d, I.attr("x2", -q), K.attr("x", -Q), J.attr("x2", -q).attr("y1", w).attr("y2", w), L.attr("x", -Q).attr("y", t), M.style("text-anchor", "end"), N.attr("x", -Q).attr("dy", l), H.attr("d", "M" + -k + "," + F[0] + "H0V" + F[1] + "H" + -k);
                        break;
                    case"right":
                        u = d, I.attr("x2", q), K.attr("x", Q), J.attr("x2", q).attr("y2", 0), L.attr("x", Q).attr("y", 0), M.style("text-anchor", "start"), N.attr("x", Q).attr("dy", l), H.attr("d", "M" + k + "," + F[0] + "H0V" + F[1] + "H" + k)
                }
                if (z.rangeBand) {
                    var S = z, T = S.rangeBand() / 2;
                    y = z = function (a) {
                        return S(a) + T
                    }
                } else y.rangeBand ? y = z : D.call(u, z);
                C.call(u, y), E.call(u, z)
            })
        }

        var k, l, m, n, o = a.scale.linear(), p = "bottom", q = 6, r = 3, s = null, t = 0, u = !0;
        return b = b || {}, k = b.withOuterTick ? 6 : 0, j.scale = function (a) {
            return arguments.length ? (o = a, j) : o
        }, j.orient = function (a) {
            return arguments.length ? (p = a in{top: 1, right: 1, bottom: 1, left: 1} ? a + "" : "bottom", j) : p
        }, j.tickFormat = function (a) {
            return arguments.length ? (l = a, j) : l
        }, j.tickCentered = function (a) {
            return arguments.length ? (n = a, j) : n
        }, j.tickOffset = function () {
            return t
        }, j.ticks = function () {
            return arguments.length ? (m = arguments, j) : m
        }, j.tickCulling = function (a) {
            return arguments.length ? (u = a, j) : u
        }, j.tickValues = function (a) {
            if ("function" == typeof a)s = function () {
                return a(o.domain())
            }; else {
                if (!arguments.length)return s;
                s = a
            }
            return j
        }, j
    }

    var e, f, g = {version: "0.4.8"};
    g.generate = function (a) {
        return new b(a)
    }, g.chart = {
        fn: b.prototype,
        internal: {fn: c.prototype}
    }, e = g.chart.fn, f = g.chart.internal.fn, f.init = function () {
        var a = this, b = a.config;
        if (a.initParams(), b.data_url)a.convertUrlToData(b.data_url, b.data_mimeType, b.data_keys, a.initWithData); else if (b.data_json)a.initWithData(a.convertJsonToData(b.data_json, b.data_keys)); else if (b.data_rows)a.initWithData(a.convertRowsToData(b.data_rows)); else {
            if (!b.data_columns)throw Error("url or json or rows or columns is required.");
            a.initWithData(a.convertColumnsToData(b.data_columns))
        }
    }, f.initParams = function () {
        var a = this, b = a.d3, c = a.config;
        a.clipId = "c3-" + +new Date + "-clip", a.clipIdForXAxis = a.clipId + "-xaxis", a.clipIdForYAxis = a.clipId + "-yaxis", a.clipIdForGrid = a.clipId + "-grid", a.clipIdForSubchart = a.clipId + "-subchart", a.clipPath = a.getClipPath(a.clipId), a.clipPathForXAxis = a.getClipPath(a.clipIdForXAxis), a.clipPathForYAxis = a.getClipPath(a.clipIdForYAxis), a.clipPathForGrid = a.getClipPath(a.clipIdForGrid), a.clipPathForSubchart = a.getClipPath(a.clipIdForSubchart), a.dragStart = null, a.dragging = !1, a.flowing = !1, a.cancelClick = !1, a.mouseover = !1, a.transiting = !1, a.color = a.generateColor(), a.levelColor = a.generateLevelColor(), a.dataTimeFormat = c.data_xLocaltime ? b.time.format : b.time.format.utc, a.axisTimeFormat = c.axis_x_localtime ? b.time.format : b.time.format.utc, a.defaultAxisTimeFormat = a.axisTimeFormat.multi([[".%L", function (a) {
            return a.getMilliseconds()
        }], [":%S", function (a) {
            return a.getSeconds()
        }], ["%I:%M", function (a) {
            return a.getMinutes()
        }], ["%I %p", function (a) {
            return a.getHours()
        }], ["%-m/%-d", function (a) {
            return a.getDay() && 1 !== a.getDate()
        }], ["%-m/%-d", function (a) {
            return 1 !== a.getDate()
        }], ["%-m/%-d", function (a) {
            return a.getMonth()
        }], ["%Y/%-m/%-d", function () {
            return !0
        }]]), a.hiddenTargetIds = [], a.hiddenLegendIds = [], a.focusedTargetIds = [], a.defocusedTargetIds = [], a.xOrient = c.axis_rotated ? "left" : "bottom", a.yOrient = c.axis_rotated ? c.axis_y_inner ? "top" : "bottom" : c.axis_y_inner ? "right" : "left", a.y2Orient = c.axis_rotated ? c.axis_y2_inner ? "bottom" : "top" : c.axis_y2_inner ? "left" : "right", a.subXOrient = c.axis_rotated ? "left" : "bottom", a.isLegendRight = "right" === c.legend_position, a.isLegendInset = "inset" === c.legend_position, a.isLegendTop = "top-left" === c.legend_inset_anchor || "top-right" === c.legend_inset_anchor, a.isLegendLeft = "top-left" === c.legend_inset_anchor || "bottom-left" === c.legend_inset_anchor, a.legendStep = 0, a.legendItemWidth = 0, a.legendItemHeight = 0, a.currentMaxTickWidths = {
            x: 0,
            y: 0,
            y2: 0
        }, a.rotated_padding_left = 30, a.rotated_padding_right = c.axis_rotated && !c.axis_x_show ? 0 : 30, a.rotated_padding_top = 5, a.withoutFadeIn = {}, a.intervalForObserveInserted = void 0, a.axes.subx = b.selectAll([])
    }, f.initChartElements = function () {
        this.initBar && this.initBar(), this.initLine && this.initLine(), this.initArc && this.initArc(), this.initGauge && this.initGauge(), this.initText && this.initText()
    }, f.initWithData = function (b) {
        var c, d, e = this, f = e.d3, g = e.config, h = !0;
        e.initPie && e.initPie(), e.initBrush && e.initBrush(), e.initZoom && e.initZoom(), e.selectChart = "function" == typeof g.bindto.node ? g.bindto : f.select(g.bindto), e.selectChart.empty() && (e.selectChart = f.select(document.createElement("div")).style("opacity", 0), e.observeInserted(e.selectChart), h = !1), e.selectChart.html("").classed("c3", !0), e.data.xs = {}, e.data.targets = e.convertDataToTargets(b), g.data_filter && (e.data.targets = e.data.targets.filter(g.data_filter)), g.data_hide && e.addHiddenTargetIds(g.data_hide === !0 ? e.mapToIds(e.data.targets) : g.data_hide), g.legend_hide && e.addHiddenLegendIds(g.legend_hide === !0 ? e.mapToIds(e.data.targets) : g.legend_hide), e.hasType("gauge") && (g.legend_show = !1), e.updateSizes(), e.updateScales(), e.x.domain(f.extent(e.getXDomain(e.data.targets))), e.y.domain(e.getYDomain(e.data.targets, "y")), e.y2.domain(e.getYDomain(e.data.targets, "y2")), e.subX.domain(e.x.domain()), e.subY.domain(e.y.domain()), e.subY2.domain(e.y2.domain()), e.orgXDomain = e.x.domain(), e.brush && e.brush.scale(e.subX), g.zoom_enabled && e.zoom.scale(e.x), e.svg = e.selectChart.append("svg").style("overflow", "hidden").on("mouseenter", function () {
            return g.onmouseover.call(e)
        }).on("mouseleave", function () {
            return g.onmouseout.call(e)
        }), c = e.svg.append("defs"), e.clipChart = e.appendClip(c, e.clipId), e.clipXAxis = e.appendClip(c, e.clipIdForXAxis), e.clipYAxis = e.appendClip(c, e.clipIdForYAxis), e.clipGrid = e.appendClip(c, e.clipIdForGrid), e.clipSubchart = e.appendClip(c, e.clipIdForSubchart), e.updateSvgSize(), d = e.main = e.svg.append("g").attr("transform", e.getTranslate("main")), e.initSubchart && e.initSubchart(), e.initTooltip && e.initTooltip(), e.initLegend && e.initLegend(), d.append("text").attr("class", i.text + " " + i.empty).attr("text-anchor", "middle").attr("dominant-baseline", "middle"), e.initRegion(), e.initGrid(), d.append("g").attr("clip-path", e.clipPath).attr("class", i.chart), g.grid_lines_front && e.initGridLines(), e.initEventRect(), e.initChartElements(), d.insert("rect", g.zoom_privileged ? null : "g." + i.regions).attr("class", i.zoomRect).attr("width", e.width).attr("height", e.height).style("opacity", 0).on("dblclick.zoom", null), g.axis_x_extent && e.brush.extent(e.getDefaultExtent()), e.initAxis(), e.updateTargets(e.data.targets), h && (e.updateDimension(), e.config.oninit.call(e), e.redraw({
            withTransform: !0,
            withUpdateXDomain: !0,
            withUpdateOrgXDomain: !0,
            withTransitionForAxis: !1
        })), null == a.onresize && (a.onresize = e.generateResize()), a.onresize.add && (a.onresize.add(function () {
            g.onresize.call(e)
        }), a.onresize.add(function () {
            e.api.flush()
        }), a.onresize.add(function () {
            g.onresized.call(e)
        })), e.api.element = e.selectChart.node()
    }, f.smoothLines = function (a, b) {
        var c = this;
        "grid" === b && a.each(function () {
            var a = c.d3.select(this), b = a.attr("x1"), d = a.attr("x2"), e = a.attr("y1"), f = a.attr("y2");
            a.attr({x1: Math.ceil(b), x2: Math.ceil(d), y1: Math.ceil(e), y2: Math.ceil(f)})
        })
    }, f.updateSizes = function () {
        var a = this, b = a.config, c = a.legend ? a.getLegendHeight() : 0, d = a.legend ? a.getLegendWidth() : 0, e = a.isLegendRight || a.isLegendInset ? 0 : c, f = a.hasArcType(), g = b.axis_rotated || f ? 0 : a.getHorizontalAxisHeight("x"), h = b.subchart_show && !f ? b.subchart_size_height + g : 0;
        a.currentWidth = a.getCurrentWidth(), a.currentHeight = a.getCurrentHeight(), a.margin = b.axis_rotated ? {
            top: a.getHorizontalAxisHeight("y2") + a.getCurrentPaddingTop(),
            right: f ? 0 : a.getCurrentPaddingRight(),
            bottom: a.getHorizontalAxisHeight("y") + e + a.getCurrentPaddingBottom(),
            left: h + (f ? 0 : a.getCurrentPaddingLeft())
        } : {
            top: 4 + a.getCurrentPaddingTop(),
            right: f ? 0 : a.getCurrentPaddingRight(),
            bottom: g + h + e + a.getCurrentPaddingBottom(),
            left: f ? 0 : a.getCurrentPaddingLeft()
        }, a.margin2 = b.axis_rotated ? {
            top: a.margin.top,
            right: 0 / 0,
            bottom: 20 + e,
            left: a.rotated_padding_left
        } : {top: a.currentHeight - h - e, right: 0 / 0, bottom: g + e, left: a.margin.left}, a.margin3 = {
            top: 0,
            right: 0 / 0,
            bottom: 0,
            left: 0
        }, a.updateSizeForLegend && a.updateSizeForLegend(c, d), a.width = a.currentWidth - a.margin.left - a.margin.right, a.height = a.currentHeight - a.margin.top - a.margin.bottom, a.width < 0 && (a.width = 0), a.height < 0 && (a.height = 0), a.width2 = b.axis_rotated ? a.margin.left - a.rotated_padding_left - a.rotated_padding_right : a.width, a.height2 = b.axis_rotated ? a.height : a.currentHeight - a.margin2.top - a.margin2.bottom, a.width2 < 0 && (a.width2 = 0), a.height2 < 0 && (a.height2 = 0), a.arcWidth = a.width - (a.isLegendRight ? d + 10 : 0), a.arcHeight = a.height - (a.isLegendRight ? 0 : 10), a.hasType("gauge") && (a.arcHeight += a.height - a.getGaugeLabelHeight()), a.updateRadius && a.updateRadius(), a.isLegendRight && f && (a.margin3.left = a.arcWidth / 2 + 1.1 * a.radiusExpanded)
    }, f.updateTargets = function (a) {
        var b = this, c = b.config;
        b.updateTargetsForText(a), b.updateTargetsForBar(a), b.updateTargetsForLine(a), b.updateTargetsForArc && b.updateTargetsForArc(a), b.updateTargetsForSubchart && b.updateTargetsForSubchart(a), b.svg.selectAll("." + i.target).filter(function (a) {
            return b.isTargetToShow(a.id)
        }).transition().duration(c.transition_duration).style("opacity", 1)
    }, f.redraw = function (a, b) {
        var c, d, e, f, g, h, j, k, l, m, n, o, p, q, r, s, u, v, w, x, y, z, A, B, C, D, E, F, G, H = this, I = H.main, J = H.d3, K = H.config, L = H.getShapeIndices(H.isAreaType), M = H.getShapeIndices(H.isBarType), N = H.getShapeIndices(H.isLineType), O = H.hasArcType(), P = H.filterTargetsToShow(H.data.targets), Q = H.xv.bind(H);
        if (a = a || {}, c = t(a, "withY", !0), d = t(a, "withSubchart", !0), e = t(a, "withTransition", !0), h = t(a, "withTransform", !1), j = t(a, "withUpdateXDomain", !1), k = t(a, "withUpdateOrgXDomain", !1), l = t(a, "withTrimXDomain", !0), p = t(a, "withUpdateXAxis", j), m = t(a, "withLegend", !1), n = t(a, "withEventRect", !0), o = t(a, "withDimension", !0), f = t(a, "withTransitionForExit", e), g = t(a, "withTransitionForAxis", e), w = e ? K.transition_duration : 0, x = f ? w : 0, y = g ? w : 0, b = b || H.generateAxisTransitions(y), m && K.legend_show ? H.updateLegend(H.mapToIds(H.data.targets), a, b) : o && H.updateDimension(!0), H.isCategorized() && 0 === P.length && H.x.domain([0, H.axes.x.selectAll(".tick").size()]), P.length ? (H.updateXDomain(P, j, k, l), K.axis_x_tick_values || (B = K.axis_x_tick_fit || K.axis_x_tick_count ? H.generateTickValues(H.mapTargetsToUniqueXs(P), K.axis_x_tick_count, H.isTimeSeries()) : void 0, H.xAxis.tickValues(B), H.subXAxis.tickValues(B))) : (H.xAxis.tickValues([]), H.subXAxis.tickValues([])), K.zoom_rescale && !a.flow && (E = H.x.orgDomain()), H.y.domain(H.getYDomain(P, "y", E)), H.y2.domain(H.getYDomain(P, "y2", E)), !K.axis_y_tick_values && K.axis_y_tick_count && H.yAxis.tickValues(H.generateTickValues(H.y.domain(), K.axis_y_tick_count)), !K.axis_y2_tick_values && K.axis_y2_tick_count && H.y2Axis.tickValues(H.generateTickValues(H.y2.domain(), K.axis_y2_tick_count)), H.redrawAxis(b, O), H.updateAxisLabels(e), (j || p) && P.length)if (K.axis_x_tick_culling && B) {
            for (C = 1; C < B.length; C++)if (B.length / C < K.axis_x_tick_culling_max) {
                D = C;
                break
            }
            H.svg.selectAll("." + i.axisX + " .tick text").each(function (a) {
                var b = B.indexOf(a);
                b >= 0 && J.select(this).style("display", b % D ? "none" : "block")
            })
        } else H.svg.selectAll("." + i.axisX + " .tick text").style("display", "block");
        q = H.generateDrawArea ? H.generateDrawArea(L, !1) : void 0, r = H.generateDrawBar ? H.generateDrawBar(M) : void 0, s = H.generateDrawLine ? H.generateDrawLine(N, !1) : void 0, u = H.generateXYForText(L, M, N, !0), v = H.generateXYForText(L, M, N, !1), c && (H.subY.domain(H.getYDomain(P, "y")), H.subY2.domain(H.getYDomain(P, "y2"))), H.tooltip.style("display", "none"), H.updateXgridFocus(), I.select("text." + i.text + "." + i.empty).attr("x", H.width / 2).attr("y", H.height / 2).text(K.data_empty_label_text).transition().style("opacity", P.length ? 0 : 1), H.redrawGrid(w), H.redrawRegion(w), H.redrawBar(x), H.redrawLine(x), H.redrawArea(x), H.redrawCircle(), H.hasDataLabel() && H.redrawText(x), H.redrawArc && H.redrawArc(w, x, h), H.redrawSubchart && H.redrawSubchart(d, b, w, x, L, M, N), I.selectAll("." + i.selectedCircles).filter(H.isBarType.bind(H)).selectAll("circle").remove(), K.interaction_enabled && !a.flow && n && (H.redrawEventRect(), H.updateZoom && H.updateZoom()), H.updateCircleY(), F = (H.config.axis_rotated ? H.circleY : H.circleX).bind(H), G = (H.config.axis_rotated ? H.circleX : H.circleY).bind(H), J.transition().duration(w).each(function () {
            var b = [];
            H.addTransitionForBar(b, r), H.addTransitionForLine(b, s), H.addTransitionForArea(b, q), H.addTransitionForCircle(b, F, G), H.addTransitionForText(b, u, v, a.flow), H.addTransitionForRegion(b), H.addTransitionForGrid(b), a.flow && (z = H.generateWait(), b.forEach(function (a) {
                z.add(a)
            }), A = H.generateFlow({
                targets: P,
                flow: a.flow,
                duration: w,
                drawBar: r,
                drawLine: s,
                drawArea: q,
                cx: F,
                cy: G,
                xv: Q,
                xForText: u,
                yForText: v
            }))
        }).call(z || function () {
        }, A || function () {
        }), H.mapToIds(H.data.targets).forEach(function (a) {
            H.withoutFadeIn[a] = !0
        })
    }, f.updateAndRedraw = function (a) {
        var b, c = this, d = c.config;
        a = a || {}, a.withTransition = t(a, "withTransition", !0), a.withTransform = t(a, "withTransform", !1), a.withLegend = t(a, "withLegend", !1), a.withUpdateXDomain = !0, a.withUpdateOrgXDomain = !0, a.withTransitionForExit = !1, a.withTransitionForTransform = t(a, "withTransitionForTransform", a.withTransition), c.updateSizes(), a.withLegend && d.legend_show || (b = c.generateAxisTransitions(a.withTransitionForAxis ? d.transition_duration : 0), c.updateScales(), c.updateSvgSize(), c.transformAll(a.withTransitionForTransform, b)), c.redraw(a, b)
    }, f.redrawWithoutRescale = function () {
        this.redraw({withY: !1, withSubchart: !1, withEventRect: !1, withTransitionForAxis: !1})
    }, f.isTimeSeries = function () {
        return "timeseries" === this.config.axis_x_type
    }, f.isCategorized = function () {
        return this.config.axis_x_type.indexOf("categor") >= 0
    }, f.isCustomX = function () {
        var a = this, b = a.config;
        return !a.isTimeSeries() && (b.data_x || s(b.data_xs))
    }, f.isTimeSeriesY = function () {
        return "timeseries" === this.config.axis_y_type
    }, f.getTranslate = function (a) {
        var b, c, d = this, e = d.config;
        return "main" === a ? (b = p(d.margin.left), c = p(d.margin.top)) : "context" === a ? (b = p(d.margin2.left), c = p(d.margin2.top)) : "legend" === a ? (b = d.margin3.left, c = d.margin3.top) : "x" === a ? (b = 0, c = e.axis_rotated ? 0 : d.height) : "y" === a ? (b = 0, c = e.axis_rotated ? d.height : 0) : "y2" === a ? (b = e.axis_rotated ? 0 : d.width, c = e.axis_rotated ? 1 : 0) : "subx" === a ? (b = 0, c = e.axis_rotated ? 0 : d.height2) : "arc" === a && (b = d.arcWidth / 2, c = d.arcHeight / 2), "translate(" + b + "," + c + ")"
    }, f.initialOpacity = function (a) {
        return null !== a.value && this.withoutFadeIn[a.id] ? 1 : 0
    }, f.initialOpacityForCircle = function (a) {
        return null !== a.value && this.withoutFadeIn[a.id] ? this.opacityForCircle(a) : 0
    }, f.opacityForCircle = function (a) {
        var b = this.config.point_show ? 1 : 0;
        return j(a.value) ? this.isScatterType(a) ? .5 : b : 0
    }, f.opacityForText = function () {
        return this.hasDataLabel() ? 1 : 0
    }, f.xx = function (a) {
        return a ? this.x(a.x) : null
    }, f.xv = function (a) {
        var b = this, c = a.value;
        return b.isTimeSeries() ? c = b.parseDate(a.value) : b.isCategorized() && "string" == typeof a.value && (c = b.config.axis_x_categories.indexOf(a.value)), Math.ceil(b.x(c))
    }, f.yv = function (a) {
        var b = this, c = a.axis && "y2" === a.axis ? b.y2 : b.y;
        return Math.ceil(c(a.value))
    }, f.subxx = function (a) {
        return a ? this.subX(a.x) : null
    }, f.transformMain = function (a, b) {
        var c, d, e, f = this;
        b && b.axisX ? c = b.axisX : (c = f.main.select("." + i.axisX), a && (c = c.transition())), b && b.axisY ? d = b.axisY : (d = f.main.select("." + i.axisY), a && (d = d.transition())), b && b.axisY2 ? e = b.axisY2 : (e = f.main.select("." + i.axisY2), a && (e = e.transition())), (a ? f.main.transition() : f.main).attr("transform", f.getTranslate("main")), c.attr("transform", f.getTranslate("x")), d.attr("transform", f.getTranslate("y")), e.attr("transform", f.getTranslate("y2")), f.main.select("." + i.chartArcs).attr("transform", f.getTranslate("arc"))
    }, f.transformAll = function (a, b) {
        var c = this;
        c.transformMain(a, b), c.config.subchart_show && c.transformContext(a, b), c.legend && c.transformLegend(a)
    }, f.updateSvgSize = function () {
        var a = this, b = a.svg.select(".c3-brush .background");
        a.svg.attr("width", a.currentWidth).attr("height", a.currentHeight), a.svg.selectAll(["#" + a.clipId, "#" + a.clipIdForGrid]).select("rect").attr("width", a.width).attr("height", a.height), a.svg.select("#" + a.clipIdForXAxis).select("rect").attr("x", a.getXAxisClipX.bind(a)).attr("y", a.getXAxisClipY.bind(a)).attr("width", a.getXAxisClipWidth.bind(a)).attr("height", a.getXAxisClipHeight.bind(a)), a.svg.select("#" + a.clipIdForYAxis).select("rect").attr("x", a.getYAxisClipX.bind(a)).attr("y", a.getYAxisClipY.bind(a)).attr("width", a.getYAxisClipWidth.bind(a)).attr("height", a.getYAxisClipHeight.bind(a)), a.svg.select("#" + a.clipIdForSubchart).select("rect").attr("width", a.width).attr("height", b.size() ? b.attr("height") : 0), a.svg.select("." + i.zoomRect).attr("width", a.width).attr("height", a.height), a.selectChart.style("max-height", a.currentHeight + "px")
    }, f.updateDimension = function (a) {
        var b = this;
        a || (b.config.axis_rotated ? (b.axes.x.call(b.xAxis), b.axes.subx.call(b.subXAxis)) : (b.axes.y.call(b.yAxis), b.axes.y2.call(b.y2Axis))), b.updateSizes(), b.updateScales(), b.updateSvgSize(), b.transformAll(!1)
    }, f.observeInserted = function (b) {
        var c = this, d = new MutationObserver(function (e) {
            e.forEach(function (e) {
                "childList" === e.type && e.previousSibling && (d.disconnect(), c.intervalForObserveInserted = a.setInterval(function () {
                    b.node().parentNode && (a.clearInterval(c.intervalForObserveInserted), c.updateDimension(), c.config.oninit.call(c), c.redraw({
                        withTransform: !0,
                        withUpdateXDomain: !0,
                        withUpdateOrgXDomain: !0,
                        withTransition: !1,
                        withTransitionForTransform: !1,
                        withLegend: !0
                    }), b.transition().style("opacity", 1))
                }, 10))
            })
        });
        d.observe(b.node(), {attributes: !0, childList: !0, characterData: !0})
    }, f.generateResize = function () {
        function a() {
            b.forEach(function (a) {
                a()
            })
        }

        var b = [];
        return a.add = function (a) {
            b.push(a)
        }, a
    }, f.endall = function (a, b) {
        var c = 0;
        a.each(function () {
            ++c
        }).each("end", function () {
            --c || b.apply(this, arguments)
        })
    }, f.generateWait = function () {
        var a = [], b = function (b, c) {
            var d = setInterval(function () {
                var b = 0;
                a.forEach(function (a) {
                    if (a.empty())return void(b += 1);
                    try {
                        a.transition()
                    } catch (c) {
                        b += 1
                    }
                }), b === a.length && (clearInterval(d), c && c())
            }, 10)
        };
        return b.add = function (b) {
            a.push(b)
        }, b
    }, f.parseDate = function (b) {
        var c, d = this;
        return c = b instanceof Date ? b : "number" != typeof b && isNaN(b) ? d.dataTimeFormat(d.config.data_xFormat).parse(b) : new Date(+b), (!c || isNaN(+c)) && a.console.error("Failed to parse x '" + b + "' to Date object"), c
    }, f.getDefaultConfig = function () {
        var a = {
            bindto: "#chart",
            size_width: void 0,
            size_height: void 0,
            padding_left: void 0,
            padding_right: void 0,
            padding_top: void 0,
            padding_bottom: void 0,
            zoom_enabled: !1,
            zoom_extent: void 0,
            zoom_privileged: !1,
            zoom_rescale: !1,
            zoom_onzoom: function () {
            },
            zoom_onzoomstart: function () {
            },
            zoom_onzoomend: function () {
            },
            interaction_enabled: !0,
            onmouseover: function () {
            },
            onmouseout: function () {
            },
            onresize: function () {
            },
            onresized: function () {
            },
            oninit: function () {
            },
            transition_duration: 350,
            data_x: void 0,
            data_xs: {},
            data_xFormat: "%Y-%m-%d",
            data_xLocaltime: !0,
            data_xSort: !0,
            data_idConverter: function (a) {
                return a
            },
            data_names: {},
            data_classes: {},
            data_groups: [],
            data_axes: {},
            data_type: void 0,
            data_types: {},
            data_labels: {},
            data_order: "desc",
            data_regions: {},
            data_color: void 0,
            data_colors: {},
            data_hide: !1,
            data_filter: void 0,
            data_selection_enabled: !1,
            data_selection_grouped: !1,
            data_selection_isselectable: function () {
                return !0
            },
            data_selection_multiple: !0,
            data_onclick: function () {
            },
            data_onmouseover: function () {
            },
            data_onmouseout: function () {
            },
            data_onselected: function () {
            },
            data_onunselected: function () {
            },
            data_ondragstart: function () {
            },
            data_ondragend: function () {
            },
            data_url: void 0,
            data_json: void 0,
            data_rows: void 0,
            data_columns: void 0,
            data_mimeType: void 0,
            data_keys: void 0,
            data_empty_label_text: "",
            subchart_show: !1,
            subchart_size_height: 60,
            subchart_onbrush: function () {
            },
            color_pattern: [],
            color_threshold: {},
            legend_show: !0,
            legend_hide: !1,
            legend_position: "bottom",
            legend_inset_anchor: "top-left",
            legend_inset_x: 10,
            legend_inset_y: 0,
            legend_inset_step: void 0,
            legend_item_onclick: void 0,
            legend_item_onmouseover: void 0,
            legend_item_onmouseout: void 0,
            legend_equally: !1,
            axis_rotated: !1,
            axis_x_show: !0,
            axis_x_type: "indexed",
            axis_x_localtime: !0,
            axis_x_categories: [],
            axis_x_tick_centered: !1,
            axis_x_tick_format: void 0,
            axis_x_tick_culling: {},
            axis_x_tick_culling_max: 10,
            axis_x_tick_count: void 0,
            axis_x_tick_fit: !0,
            axis_x_tick_values: null,
            axis_x_tick_rotate: 0,
            axis_x_tick_outer: !0,
            axis_x_tick_multiline: !0,
            axis_x_tick_width: null,
            axis_x_max: void 0,
            axis_x_min: void 0,
            axis_x_padding: {},
            axis_x_height: void 0,
            axis_x_extent: void 0,
            axis_x_label: {},
            axis_y_show: !0,
            axis_y_type: void 0,
            axis_y_max: void 0,
            axis_y_min: void 0,
            axis_y_center: void 0,
            axis_y_inner: void 0,
            axis_y_label: {},
            axis_y_tick_format: void 0,
            axis_y_tick_outer: !0,
            axis_y_tick_values: null,
            axis_y_tick_count: void 0,
            axis_y_tick_time_value: void 0,
            axis_y_tick_time_interval: void 0,
            axis_y_padding: {},
            axis_y_default: void 0,
            axis_y2_show: !1,
            axis_y2_max: void 0,
            axis_y2_min: void 0,
            axis_y2_center: void 0,
            axis_y2_inner: void 0,
            axis_y2_label: {},
            axis_y2_tick_format: void 0,
            axis_y2_tick_outer: !0,
            axis_y2_tick_values: null,
            axis_y2_tick_count: void 0,
            axis_y2_padding: {},
            axis_y2_default: void 0,
            grid_x_show: !1,
            grid_x_type: "tick",
            grid_x_lines: [],
            grid_y_show: !1,
            grid_y_lines: [],
            grid_y_ticks: 10,
            grid_focus_show: !0,
            grid_lines_front: !0,
            point_show: !0,
            point_r: 2.5,
            point_focus_expand_enabled: !0,
            point_focus_expand_r: void 0,
            point_select_r: void 0,
            line_connectNull: !1,
            line_step_type: "step",
            bar_width: void 0,
            bar_width_ratio: .6,
            bar_width_max: void 0,
            bar_zerobased: !0,
            area_zerobased: !0,
            pie_label_show: !0,
            pie_label_format: void 0,
            pie_label_threshold: .05,
            pie_expand: !0,
            gauge_label_show: !0,
            gauge_label_format: void 0,
            gauge_expand: !0,
            gauge_min: 0,
            gauge_max: 100,
            gauge_units: void 0,
            gauge_width: void 0,
            donut_label_show: !0,
            donut_label_format: void 0,
            donut_label_threshold: .05,
            donut_width: void 0,
            donut_expand: !0,
            donut_title: "",
            regions: [],
            tooltip_show: !0,
            tooltip_grouped: !0,
            tooltip_format_title: void 0,
            tooltip_format_name: void 0,
            tooltip_format_value: void 0,
            tooltip_contents: function (a, b, c, d) {
                return this.getTooltipContent ? this.getTooltipContent(a, b, c, d) : ""
            },
            tooltip_init_show: !1,
            tooltip_init_x: 0,
            tooltip_init_position: {top: "0px", left: "50px"}
        };
        return Object.keys(this.additionalConfig).forEach(function (b) {
            a[b] = this.additionalConfig[b]
        }, this), a
    }, f.additionalConfig = {}, f.loadConfig = function (a) {
        function b() {
            var a = d.shift();
            return a && c && "object" == typeof c && a in c ? (c = c[a], b()) : a ? void 0 : c
        }

        var c, d, e, f = this.config;
        Object.keys(f).forEach(function (g) {
            c = a, d = g.split("_"), e = b(), n(e) && (f[g] = e)
        })
    }, f.getScale = function (a, b, c) {
        return (c ? this.d3.time.scale() : this.d3.scale.linear()).range([a, b])
    }, f.getX = function (a, b, c, d) {
        var e, f = this, g = f.getScale(a, b, f.isTimeSeries()), h = c ? g.domain(c) : g;
        f.isCategorized() ? (d = d || function () {
            return 0
        }, g = function (a, b) {
            var c = h(a) + d(a);
            return b ? c : Math.ceil(c)
        }) : g = function (a, b) {
            var c = h(a);
            return b ? c : Math.ceil(c)
        };
        for (e in h)g[e] = h[e];
        return g.orgDomain = function () {
            return h.domain()
        }, f.isCategorized() && (g.domain = function (a) {
            return arguments.length ? (h.domain(a), g) : (a = this.orgDomain(), [a[0], a[1] + 1])
        }), g
    }, f.getY = function (a, b, c) {
        var d = this.getScale(a, b, this.isTimeSeriesY());
        return c && d.domain(c), d
    }, f.getYScale = function (a) {
        return "y2" === this.getAxisId(a) ? this.y2 : this.y
    }, f.getSubYScale = function (a) {
        return "y2" === this.getAxisId(a) ? this.subY2 : this.subY
    }, f.updateScales = function () {
        var a = this, b = a.config, c = !a.x;
        a.xMin = b.axis_rotated ? 1 : 0, a.xMax = b.axis_rotated ? a.height : a.width, a.yMin = b.axis_rotated ? 0 : a.height, a.yMax = b.axis_rotated ? a.width : 1, a.subXMin = a.xMin, a.subXMax = a.xMax, a.subYMin = b.axis_rotated ? 0 : a.height2, a.subYMax = b.axis_rotated ? a.width2 : 1, a.x = a.getX(a.xMin, a.xMax, c ? void 0 : a.x.orgDomain(), function () {
            return a.xAxis.tickOffset()
        }), a.y = a.getY(a.yMin, a.yMax, c ? b.axis_y_default : a.y.domain()), a.y2 = a.getY(a.yMin, a.yMax, c ? b.axis_y2_default : a.y2.domain()), a.subX = a.getX(a.xMin, a.xMax, a.orgXDomain, function (b) {
            return b % 1 ? 0 : a.subXAxis.tickOffset()
        }), a.subY = a.getY(a.subYMin, a.subYMax, c ? b.axis_y_default : a.subY.domain()), a.subY2 = a.getY(a.subYMin, a.subYMax, c ? b.axis_y2_default : a.subY2.domain()), a.xAxisTickFormat = a.getXAxisTickFormat(), a.xAxisTickValues = a.getXAxisTickValues(), a.yAxisTickValues = a.getYAxisTickValues(), a.y2AxisTickValues = a.getY2AxisTickValues(), a.xAxis = a.getXAxis(a.x, a.xOrient, a.xAxisTickFormat, a.xAxisTickValues, b.axis_x_tick_outer), a.subXAxis = a.getXAxis(a.subX, a.subXOrient, a.xAxisTickFormat, a.xAxisTickValues, b.axis_x_tick_outer), a.yAxis = a.getYAxis(a.y, a.yOrient, b.axis_y_tick_format, a.yAxisTickValues, b.axis_y_tick_outer), a.y2Axis = a.getYAxis(a.y2, a.y2Orient, b.axis_y2_tick_format, a.y2AxisTickValues, b.axis_y2_tick_outer), c || (a.brush && a.brush.scale(a.subX), b.zoom_enabled && a.zoom.scale(a.x)), a.updateArc && a.updateArc()
    }, f.getYDomainMin = function (a) {
        var b, c, d, e, f, g, h = this, i = h.config, j = h.mapToIds(a), k = h.getValuesAsIdKeyed(a);
        if (i.data_groups.length > 0)for (g = h.hasNegativeValueInTargets(a), b = 0; b < i.data_groups.length; b++)if (e = i.data_groups[b].filter(function (a) {
                return j.indexOf(a) >= 0
            }), 0 !== e.length)for (d = e[0], g && k[d] && k[d].forEach(function (a, b) {
            k[d][b] = 0 > a ? a : 0
        }), c = 1; c < e.length; c++)f = e[c], k[f] && k[f].forEach(function (a, b) {
            h.getAxisId(f) !== h.getAxisId(d) || !k[d] || g && +a > 0 || (k[d][b] += +a)
        });
        return h.d3.min(Object.keys(k).map(function (a) {
            return h.d3.min(k[a])
        }))
    }, f.getYDomainMax = function (a) {
        var b, c, d, e, f, g, h = this, i = h.config, j = h.mapToIds(a), k = h.getValuesAsIdKeyed(a);
        if (i.data_groups.length > 0)for (g = h.hasPositiveValueInTargets(a), b = 0; b < i.data_groups.length; b++)if (e = i.data_groups[b].filter(function (a) {
                return j.indexOf(a) >= 0
            }), 0 !== e.length)for (d = e[0], g && k[d] && k[d].forEach(function (a, b) {
            k[d][b] = a > 0 ? a : 0
        }), c = 1; c < e.length; c++)f = e[c], k[f] && k[f].forEach(function (a, b) {
            h.getAxisId(f) !== h.getAxisId(d) || !k[d] || g && 0 > +a || (k[d][b] += +a)
        });
        return h.d3.max(Object.keys(k).map(function (a) {
            return h.d3.max(k[a])
        }))
    }, f.getYDomain = function (a, b, c) {
        var d, e, f, g, h, i, k, l, m, n, o = this, p = o.config, r = a.filter(function (a) {
            return o.getAxisId(a.id) === b
        }), t = c ? o.filterByXDomain(r, c) : r, u = "y2" === b ? p.axis_y2_min : p.axis_y_min, v = "y2" === b ? p.axis_y2_max : p.axis_y_max, w = j(u) ? u : o.getYDomainMin(t), x = j(v) ? v : o.getYDomainMax(t), y = "y2" === b ? p.axis_y2_center : p.axis_y_center, z = o.hasType("bar", t) && p.bar_zerobased || o.hasType("area", t) && p.area_zerobased, A = o.hasDataLabel() && p.axis_rotated, B = o.hasDataLabel() && !p.axis_rotated;
        return w > x && (j(u) ? x = w + 10 : w = x - 10), 0 === t.length ? "y2" === b ? o.y2.domain() : o.y.domain() : (isNaN(w) && (w = 0), isNaN(x) && (x = w), w === x && (0 > w ? x = 0 : w = 0), m = w >= 0 && x >= 0, n = 0 >= w && 0 >= x, (j(u) && m || j(v) && n) && (z = !1), z && (m && (w = 0), n && (x = 0)), d = Math.abs(x - w), e = f = g = .1 * d, "undefined" != typeof y && (h = Math.max(Math.abs(w), Math.abs(x)), x = y + h, w = y - h), A ? (i = o.getDataLabelLength(w, x, b, "width"), k = q(o.y.range()), l = [i[0] / k, i[1] / k], f += d * (l[1] / (1 - l[0] - l[1])), g += d * (l[0] / (1 - l[0] - l[1]))) : B && (i = o.getDataLabelLength(w, x, b, "height"), f += this.convertPixelsToAxisPadding(i[1], d), g += this.convertPixelsToAxisPadding(i[0], d)), "y" === b && s(p.axis_y_padding) && (f = o.getAxisPadding(p.axis_y_padding, "top", f, d), g = o.getAxisPadding(p.axis_y_padding, "bottom", g, d)), "y2" === b && s(p.axis_y2_padding) && (f = o.getAxisPadding(p.axis_y2_padding, "top", f, d), g = o.getAxisPadding(p.axis_y2_padding, "bottom", g, d)), z && (m && (g = w), n && (f = -x)), [w - g, x + f])
    }, f.getXDomainMin = function (a) {
        var b = this, c = b.config;
        return n(c.axis_x_min) ? b.isTimeSeries() ? this.parseDate(c.axis_x_min) : c.axis_x_min : b.d3.min(a, function (a) {
            return b.d3.min(a.values, function (a) {
                return a.x
            })
        })
    }, f.getXDomainMax = function (a) {
        var b = this, c = b.config;
        return n(c.axis_x_max) ? b.isTimeSeries() ? this.parseDate(c.axis_x_max) : c.axis_x_max : b.d3.max(a, function (a) {
            return b.d3.max(a.values, function (a) {
                return a.x
            })
        })
    }, f.getXDomainPadding = function (a) {
        var b, c, d, e, f = this, g = f.config, h = a[1] - a[0];
        return f.isCategorized() ? c = 0 : f.hasType("bar") ? (b = f.getMaxDataCount(), c = b > 1 ? h / (b - 1) / 2 : .5) : c = .01 * h, "object" == typeof g.axis_x_padding && s(g.axis_x_padding) ? (d = j(g.axis_x_padding.left) ? g.axis_x_padding.left : c, e = j(g.axis_x_padding.right) ? g.axis_x_padding.right : c) : d = e = "number" == typeof g.axis_x_padding ? g.axis_x_padding : c, {
            left: d,
            right: e
        }
    }, f.getXDomain = function (a) {
        var b = this, c = [b.getXDomainMin(a), b.getXDomainMax(a)], d = c[0], e = c[1], f = b.getXDomainPadding(c), g = 0, h = 0;
        return d - e !== 0 || b.isCategorized() || (b.isTimeSeries() ? (d = new Date(.5 * d.getTime()), e = new Date(1.5 * e.getTime())) : (d = 0 === d ? 1 : .5 * d, e = 0 === e ? -1 : 1.5 * e)), (d || 0 === d) && (g = b.isTimeSeries() ? new Date(d.getTime() - f.left) : d - f.left), (e || 0 === e) && (h = b.isTimeSeries() ? new Date(e.getTime() + f.right) : e + f.right), [g, h]
    }, f.updateXDomain = function (a, b, c, d, e) {
        var f = this, g = f.config;
        return c && (f.x.domain(e ? e : f.d3.extent(f.getXDomain(a))), f.orgXDomain = f.x.domain(), g.zoom_enabled && f.zoom.scale(f.x).updateScaleExtent(), f.subX.domain(f.x.domain()), f.brush && f.brush.scale(f.subX)), b && (f.x.domain(e ? e : !f.brush || f.brush.empty() ? f.orgXDomain : f.brush.extent()), g.zoom_enabled && f.zoom.scale(f.x).updateScaleExtent()), d && f.x.domain(f.trimXDomain(f.x.orgDomain())), f.x.domain()
    }, f.trimXDomain = function (a) {
        var b = this;
        return a[0] <= b.orgXDomain[0] && (a[1] = +a[1] + (b.orgXDomain[0] - a[0]), a[0] = b.orgXDomain[0]), b.orgXDomain[1] <= a[1] && (a[0] = +a[0] - (a[1] - b.orgXDomain[1]), a[1] = b.orgXDomain[1]), a
    }, f.isX = function (a) {
        var b = this, c = b.config;
        return c.data_x && a === c.data_x || s(c.data_xs) && u(c.data_xs, a)
    }, f.isNotX = function (a) {
        return !this.isX(a)
    }, f.getXKey = function (a) {
        var b = this, c = b.config;
        return c.data_x ? c.data_x : s(c.data_xs) ? c.data_xs[a] : null
    }, f.getXValuesOfXKey = function (a, b) {
        var c, d = this, e = b && s(b) ? d.mapToIds(b) : [];
        return e.forEach(function (b) {
            d.getXKey(b) === a && (c = d.data.xs[b])
        }), c
    }, f.getIndexByX = function (a) {
        var b = this, c = b.filterByX(b.data.targets, a);
        return c.length ? c[0].index : null
    }, f.getXValue = function (a, b) {
        var c = this;
        return a in c.data.xs && c.data.xs[a] && j(c.data.xs[a][b]) ? c.data.xs[a][b] : b
    }, f.getOtherTargetXs = function () {
        var a = this, b = Object.keys(a.data.xs);
        return b.length ? a.data.xs[b[0]] : null
    }, f.getOtherTargetX = function (a) {
        var b = this.getOtherTargetXs();
        return b && a < b.length ? b[a] : null
    }, f.addXs = function (a) {
        var b = this;
        Object.keys(a).forEach(function (c) {
            b.config.data_xs[c] = a[c]
        })
    }, f.hasMultipleX = function (a) {
        return this.d3.set(Object.keys(a).map(function (b) {
                return a[b]
            })).size() > 1
    }, f.isMultipleX = function () {
        return s(this.config.data_xs) || !this.config.data_xSort || this.hasType("scatter")
    }, f.addName = function (a) {
        var b, c = this;
        return a && (b = c.config.data_names[a.id], a.name = b ? b : a.id), a
    }, f.getValueOnIndex = function (a, b) {
        var c = a.filter(function (a) {
            return a.index === b
        });
        return c.length ? c[0] : null
    }, f.updateTargetX = function (a, b) {
        var c = this;
        a.forEach(function (a) {
            a.values.forEach(function (d, e) {
                d.x = c.generateTargetX(b[e], a.id, e)
            }), c.data.xs[a.id] = b
        })
    }, f.updateTargetXs = function (a, b) {
        var c = this;
        a.forEach(function (a) {
            b[a.id] && c.updateTargetX([a], b[a.id])
        })
    }, f.generateTargetX = function (a, b, c) {
        var d, e = this;
        return d = e.isTimeSeries() ? e.parseDate(a ? a : e.getXValue(b, c)) : e.isCustomX() && !e.isCategorized() ? j(a) ? +a : e.getXValue(b, c) : c
    }, f.cloneTarget = function (a) {
        return {
            id: a.id, id_org: a.id_org, values: a.values.map(function (a) {
                return {x: a.x, value: a.value, id: a.id}
            })
        }
    }, f.updateXs = function () {
        var a = this;
        a.data.targets.length && (a.xs = [], a.data.targets[0].values.forEach(function (b) {
            a.xs[b.index] = b.x
        }))
    }, f.getPrevX = function (a) {
        var b = this.xs[a - 1];
        return "undefined" != typeof b ? b : null
    }, f.getNextX = function (a) {
        var b = this.xs[a + 1];
        return "undefined" != typeof b ? b : null
    }, f.getMaxDataCount = function () {
        var a = this;
        return a.d3.max(a.data.targets, function (a) {
            return a.values.length
        })
    }, f.getMaxDataCountTarget = function (a) {
        var b, c = a.length, d = 0;
        return c > 1 ? a.forEach(function (a) {
            a.values.length > d && (b = a, d = a.values.length)
        }) : b = c ? a[0] : null, b
    }, f.getEdgeX = function (a) {
        var b = this;
        return a.length ? [b.d3.min(a, function (a) {
            return a.values[0].x
        }), b.d3.max(a, function (a) {
            return a.values[a.values.length - 1].x
        })] : [0, 0]
    }, f.mapToIds = function (a) {
        return a.map(function (a) {
            return a.id
        })
    }, f.mapToTargetIds = function (a) {
        var b = this;
        return a ? l(a) ? [a] : a : b.mapToIds(b.data.targets)
    }, f.hasTarget = function (a, b) {
        var c, d = this.mapToIds(a);
        for (c = 0; c < d.length; c++)if (d[c] === b)return !0;
        return !1
    }, f.isTargetToShow = function (a) {
        return this.hiddenTargetIds.indexOf(a) < 0
    }, f.isLegendToShow = function (a) {
        return this.hiddenLegendIds.indexOf(a) < 0
    }, f.filterTargetsToShow = function (a) {
        var b = this;
        return a.filter(function (a) {
            return b.isTargetToShow(a.id)
        })
    }, f.mapTargetsToUniqueXs = function (a) {
        var b = this, c = b.d3.set(b.d3.merge(a.map(function (a) {
            return a.values.map(function (a) {
                return +a.x
            })
        }))).values();
        return c.map(b.isTimeSeries() ? function (a) {
            return new Date(+a)
        } : function (a) {
            return +a
        })
    }, f.addHiddenTargetIds = function (a) {
        this.hiddenTargetIds = this.hiddenTargetIds.concat(a)
    }, f.removeHiddenTargetIds = function (a) {
        this.hiddenTargetIds = this.hiddenTargetIds.filter(function (b) {
            return a.indexOf(b) < 0
        })
    }, f.addHiddenLegendIds = function (a) {
        this.hiddenLegendIds = this.hiddenLegendIds.concat(a)
    }, f.removeHiddenLegendIds = function (a) {
        this.hiddenLegendIds = this.hiddenLegendIds.filter(function (b) {
            return a.indexOf(b) < 0
        })
    }, f.getValuesAsIdKeyed = function (a) {
        var b = {};
        return a.forEach(function (a) {
            b[a.id] = [], a.values.forEach(function (c) {
                b[a.id].push(c.value)
            })
        }), b
    }, f.checkValueInTargets = function (a, b) {
        var c, d, e, f = Object.keys(a);
        for (c = 0; c < f.length; c++)for (e = a[f[c]].values, d = 0; d < e.length; d++)if (b(e[d].value))return !0;
        return !1
    }, f.hasNegativeValueInTargets = function (a) {
        return this.checkValueInTargets(a, function (a) {
            return 0 > a
        })
    }, f.hasPositiveValueInTargets = function (a) {
        return this.checkValueInTargets(a, function (a) {
            return a > 0
        })
    }, f.isOrderDesc = function () {
        var a = this.config;
        return "string" == typeof a.data_order && "desc" === a.data_order.toLowerCase()
    }, f.isOrderAsc = function () {
        var a = this.config;
        return "string" == typeof a.data_order && "asc" === a.data_order.toLowerCase()
    }, f.orderTargets = function (a) {
        var b = this, c = b.config, d = b.isOrderAsc(), e = b.isOrderDesc();
        return d || e ? a.sort(function (a, b) {
            var c = function (a, b) {
                return a + Math.abs(b.value)
            }, e = a.values.reduce(c, 0), f = b.values.reduce(c, 0);
            return d ? f - e : e - f
        }) : k(c.data_order) && a.sort(c.data_order), a
    }, f.filterByX = function (a, b) {
        return this.d3.merge(a.map(function (a) {
            return a.values
        })).filter(function (a) {
            return a.x - b === 0
        })
    }, f.filterRemoveNull = function (a) {
        return a.filter(function (a) {
            return j(a.value)
        })
    }, f.filterByXDomain = function (a, b) {
        return a.map(function (a) {
            return {
                id: a.id, id_org: a.id_org, values: a.values.filter(function (a) {
                    return b[0] <= a.x && a.x <= b[1]
                })
            }
        })
    }, f.hasDataLabel = function () {
        var a = this.config;
        return "boolean" == typeof a.data_labels && a.data_labels ? !0 : "object" == typeof a.data_labels && s(a.data_labels) ? !0 : !1
    }, f.getDataLabelLength = function (a, b, c, d) {
        var e = this, f = [0, 0], g = 1.3;
        return e.selectChart.select("svg").selectAll(".dummy").data([a, b]).enter().append("text").text(function (a) {
            return e.formatByAxisId(c)(a)
        }).each(function (a, b) {
            f[b] = this.getBoundingClientRect()[d] * g
        }).remove(), f
    }, f.isNoneArc = function (a) {
        return this.hasTarget(this.data.targets, a.id)
    },f.isArc = function (a) {
        return "data"in a && this.hasTarget(this.data.targets, a.data.id)
    },f.findSameXOfValues = function (a, b) {
        var c, d = a[b].x, e = [];
        for (c = b - 1; c >= 0 && d === a[c].x; c--)e.push(a[c]);
        for (c = b; c < a.length && d === a[c].x; c++)e.push(a[c]);
        return e
    },f.findClosestFromTargets = function (a, b) {
        var c, d = this;
        return c = a.map(function (a) {
            return d.findClosest(a.values, b)
        }), d.findClosest(c, b)
    },f.findClosest = function (a, b) {
        var c, d = this, e = 100;
        return a.filter(function (a) {
            return a && d.isBarType(a.id)
        }).forEach(function (a) {
            var b = d.main.select("." + i.bars + d.getTargetSelectorSuffix(a.id) + " ." + i.bar + "-" + a.index).node();
            !c && d.isWithinBar(b) && (c = a)
        }), a.filter(function (a) {
            return a && !d.isBarType(a.id)
        }).forEach(function (a) {
            var f = d.dist(a, b);
            e > f && (e = f, c = a)
        }), c
    },f.dist = function (a, b) {
        var c = this, d = c.config, e = d.axis_rotated ? 1 : 0, f = d.axis_rotated ? 0 : 1, g = c.circleY(a, a.index), h = c.x(a.x);
        return Math.pow(h - b[e], 2) + Math.pow(g - b[f], 2)
    },f.convertValuesToStep = function (a) {
        var b, c = [].concat(a);
        if (!this.isCategorized())return a;
        for (b = a.length + 1; b > 0; b--)c[b] = c[b - 1];
        return c[0] = {x: c[0].x - 1, value: c[0].value, id: c[0].id}, c[a.length + 1] = {
            x: c[a.length].x + 1,
            value: c[a.length].value,
            id: c[a.length].id
        }, c
    },f.updateDataAttributes = function (a, b) {
        var c = this, d = c.config, e = d["data_" + a];
        return "undefined" == typeof b ? e : (Object.keys(b).forEach(function (a) {
            e[a] = b[a]
        }), c.redraw({withLegend: !0}), e)
    },f.convertUrlToData = function (a, b, c, d) {
        var e = this, f = b ? b : "csv";
        e.d3.xhr(a, function (a, b) {
            var g;
            g = "json" === f ? e.convertJsonToData(JSON.parse(b.response), c) : "tsv" === f ? e.convertTsvToData(b.response) : e.convertCsvToData(b.response), d.call(e, g)
        })
    },f.convertXsvToData = function (a, b) {
        var c, d = b.parseRows(a);
        return 1 === d.length ? (c = [{}], d[0].forEach(function (a) {
            c[0][a] = null
        })) : c = b.parse(a), c
    },f.convertCsvToData = function (a) {
        return this.convertXsvToData(a, this.d3.csv)
    },f.convertTsvToData = function (a) {
        return this.convertXsvToData(a, this.d3.tsv)
    },f.convertJsonToData = function (a, b) {
        var c, d, e = this, f = [];
        return b ? (c = b.value, b.x && (c.push(b.x), e.config.data_x = b.x), f.push(c), a.forEach(function (a) {
            var b = [];
            c.forEach(function (c) {
                var d = m(a[c]) ? null : a[c];
                b.push(d)
            }), f.push(b)
        }), d = e.convertRowsToData(f)) : (Object.keys(a).forEach(function (b) {
            f.push([b].concat(a[b]))
        }), d = e.convertColumnsToData(f)), d
    },f.convertRowsToData = function (a) {
        var b, c, d = a[0], e = {}, f = [];
        for (b = 1; b < a.length; b++) {
            for (e = {}, c = 0; c < a[b].length; c++) {
                if (m(a[b][c]))throw new Error("Source data is missing a component at (" + b + "," + c + ")!");
                e[d[c]] = a[b][c]
            }
            f.push(e)
        }
        return f
    },f.convertColumnsToData = function (a) {
        var b, c, d, e = [];
        for (b = 0; b < a.length; b++)for (d = a[b][0], c = 1; c < a[b].length; c++) {
            if (m(e[c - 1]) && (e[c - 1] = {}), m(a[b][c]))throw new Error("Source data is missing a component at (" + b + "," + c + ")!");
            e[c - 1][d] = a[b][c]
        }
        return e
    },f.convertDataToTargets = function (a, b) {
        var c, d = this, e = d.config, f = d.d3.keys(a[0]).filter(d.isNotX, d), g = d.d3.keys(a[0]).filter(d.isX, d);
        return f.forEach(function (c) {
            var f = d.getXKey(c);
            d.isCustomX() || d.isTimeSeries() ? g.indexOf(f) >= 0 ? d.data.xs[c] = (b && d.data.xs[c] ? d.data.xs[c] : []).concat(a.map(function (a) {
                return a[f]
            }).filter(j).map(function (a, b) {
                return d.generateTargetX(a, c, b)
            })) : e.data_x ? d.data.xs[c] = d.getOtherTargetXs() : s(e.data_xs) && (d.data.xs[c] = d.getXValuesOfXKey(f, d.data.targets)) : d.data.xs[c] = a.map(function (a, b) {
                return b
            })
        }), f.forEach(function (a) {
            if (!d.data.xs[a])throw new Error('x is not defined for id = "' + a + '".')
        }), c = f.map(function (b, c) {
            var f = e.data_idConverter(b);
            return {
                id: f, id_org: b, values: a.map(function (a, g) {
                    var h = d.getXKey(b), i = a[h], j = d.generateTargetX(i, b, g);
                    return d.isCustomX() && d.isCategorized() && 0 === c && i && (0 === g && (e.axis_x_categories = []), e.axis_x_categories.push(i)), (m(a[b]) || d.data.xs[b].length <= g) && (j = void 0), {
                        x: j,
                        value: null === a[b] || isNaN(a[b]) ? null : +a[b],
                        id: f
                    }
                }).filter(function (a) {
                    return n(a.x)
                })
            }
        }), c.forEach(function (a) {
            var b;
            e.data_xSort && (a.values = a.values.sort(function (a, b) {
                var c = a.x || 0 === a.x ? a.x : 1 / 0, d = b.x || 0 === b.x ? b.x : 1 / 0;
                return c - d
            })), b = 0, a.values.forEach(function (a) {
                a.index = b++
            }), d.data.xs[a.id].sort(function (a, b) {
                return a - b
            })
        }), e.data_type && d.setTargetType(d.mapToIds(c).filter(function (a) {
            return !(a in e.data_types)
        }), e.data_type), c.forEach(function (a) {
            d.addCache(a.id_org, a)
        }), c
    },f.load = function (a, b) {
        var c = this;
        a && (b.filter && (a = a.filter(b.filter)), (b.type || b.types) && a.forEach(function (a) {
            c.setTargetType(a.id, b.types ? b.types[a.id] : b.type)
        }), c.data.targets.forEach(function (b) {
            for (var c = 0; c < a.length; c++)if (b.id === a[c].id) {
                b.values = a[c].values, a.splice(c, 1);
                break
            }
        }), c.data.targets = c.data.targets.concat(a)), c.updateTargets(c.data.targets), c.redraw({
            withUpdateOrgXDomain: !0,
            withUpdateXDomain: !0,
            withLegend: !0
        }), b.done && b.done()
    },f.loadFromArgs = function (a) {
        var b = this;
        a.data ? b.load(b.convertDataToTargets(a.data), a) : a.url ? b.convertUrlToData(a.url, a.mimeType, a.keys, function (c) {
            b.load(b.convertDataToTargets(c), a)
        }) : a.json ? b.load(b.convertDataToTargets(b.convertJsonToData(a.json, a.keys)), a) : a.rows ? b.load(b.convertDataToTargets(b.convertRowsToData(a.rows)), a) : a.columns ? b.load(b.convertDataToTargets(b.convertColumnsToData(a.columns)), a) : b.load(null, a)
    },f.unload = function (a, b) {
        var c = this;
        return b || (b = function () {
        }), a = a.filter(function (a) {
            return c.hasTarget(c.data.targets, a)
        }), a && 0 !== a.length ? (c.svg.selectAll(a.map(function (a) {
            return c.selectorTarget(a)
        })).transition().style("opacity", 0).remove().call(c.endall, b), void a.forEach(function (a) {
            c.withoutFadeIn[a] = !1, c.legend && c.legend.selectAll("." + i.legendItem + c.getTargetSelectorSuffix(a)).remove(), c.data.targets = c.data.targets.filter(function (b) {
                return b.id !== a
            })
        })) : void b()
    },f.categoryName = function (a) {
        var b = this.config;
        return a < b.axis_x_categories.length ? b.axis_x_categories[a] : a
    },f.initEventRect = function () {
        var a = this;
        a.main.select("." + i.chart).append("g").attr("class", i.eventRects).style("fill-opacity", 0)
    },f.redrawEventRect = function () {
        var a, b, c = this, d = c.config, e = c.isMultipleX(), f = c.main.select("." + i.eventRects).style("cursor", d.zoom_enabled ? d.axis_rotated ? "ns-resize" : "ew-resize" : null).classed(i.eventRectsMultiple, e).classed(i.eventRectsSingle, !e);
        f.selectAll("." + i.eventRect).remove(), c.eventRect = f.selectAll("." + i.eventRect), e ? (a = c.eventRect.data([0]), c.generateEventRectsForMultipleXs(a.enter()), c.updateEventRect(a)) : (b = c.getMaxDataCountTarget(c.data.targets), f.datum(b ? b.values : []), c.eventRect = f.selectAll("." + i.eventRect), a = c.eventRect.data(function (a) {
            return a
        }), c.generateEventRectsForSingleX(a.enter()), c.updateEventRect(a), a.exit().remove())
    },f.updateEventRect = function (a) {
        var b, c, d, e, f, g, h = this, i = h.config;
        a = a || h.eventRect.data(function (a) {
            return a
        }), h.isMultipleX() ? (b = 0, c = 0, d = h.width, e = h.height) : (!h.isCustomX() && !h.isTimeSeries() || h.isCategorized() ? (f = h.getEventRectWidth(), g = function (a) {
            return h.x(a.x) - f / 2
        }) : (h.updateXs(), f = function (a) {
            var b = h.getPrevX(a.index), c = h.getNextX(a.index);
            return null === b && null === c ? i.axis_rotated ? h.height : h.width : (null === b && (b = h.x.domain()[0]), null === c && (c = h.x.domain()[1]), Math.max(0, (h.x(c) - h.x(b)) / 2))
        }, g = function (a) {
            var b = h.getPrevX(a.index), c = h.getNextX(a.index), d = h.data.xs[a.id][a.index];
            return null === b && null === c ? 0 : (null === b && (b = h.x.domain()[0]), (h.x(d) + h.x(b)) / 2)
        }), b = i.axis_rotated ? 0 : g, c = i.axis_rotated ? g : 0, d = i.axis_rotated ? h.width : f, e = i.axis_rotated ? f : h.height), a.attr("class", h.classEvent.bind(h)).attr("x", b).attr("y", c).attr("width", d).attr("height", e)
    },f.generateEventRectsForSingleX = function (a) {
        var b = this, c = b.d3, d = b.config;
        a.append("rect").attr("class", b.classEvent.bind(b)).style("cursor", d.data_selection_enabled && d.data_selection_grouped ? "pointer" : null).on("mouseover", function (a) {
            var c, e, f = a.index;
            b.dragging || b.flowing || b.hasArcType() || (c = b.data.targets.map(function (a) {
                return b.addName(b.getValueOnIndex(a.values, f))
            }), e = [], Object.keys(d.data_names).forEach(function (a) {
                for (var b = 0; b < c.length; b++)if (c[b] && c[b].id === a) {
                    e.push(c[b]), c.shift(b);
                    break
                }
            }), c = e.concat(c), d.point_focus_expand_enabled && b.expandCircles(f, null, !0), b.expandBars(f, null, !0), b.main.selectAll("." + i.shape + "-" + f).each(function (a) {
                d.data_onmouseover.call(b.api, a)
            }))
        }).on("mouseout", function (a) {
            var c = a.index;
            b.hasArcType() || (b.hideXGridFocus(), b.hideTooltip(), b.unexpandCircles(), b.unexpandBars(), b.main.selectAll("." + i.shape + "-" + c).each(function (a) {
                d.data_onmouseout.call(b.api, a)
            }))
        }).on("mousemove", function (a) {
            var e, f = a.index, g = b.svg.select("." + i.eventRect + "-" + f);
            b.dragging || b.flowing || b.hasArcType() || (b.isStepType(a) && "step-after" === b.config.line_step_type && c.mouse(this)[0] < b.x(b.getXValue(a.id, f)) && (f -= 1), e = b.filterTargetsToShow(b.data.targets).map(function (a) {
                return b.addName(b.getValueOnIndex(a.values, f))
            }), d.tooltip_grouped && (b.showTooltip(e, c.mouse(this)), b.showXGridFocus(e)), (!d.tooltip_grouped || d.data_selection_enabled && !d.data_selection_grouped) && b.main.selectAll("." + i.shape + "-" + f).each(function () {
                c.select(this).classed(i.EXPANDED, !0), d.data_selection_enabled && g.style("cursor", d.data_selection_grouped ? "pointer" : null), d.tooltip_grouped || (b.hideXGridFocus(), b.hideTooltip(), d.data_selection_grouped || (b.unexpandCircles(f), b.unexpandBars(f)))
            }).filter(function (a) {
                return b.isWithinShape(this, a)
            }).each(function (a) {
                d.data_selection_enabled && (d.data_selection_grouped || d.data_selection_isselectable(a)) && g.style("cursor", "pointer"), d.tooltip_grouped || (b.showTooltip([a], c.mouse(this)), b.showXGridFocus([a]), d.point_focus_expand_enabled && b.expandCircles(f, a.id, !0), b.expandBars(f, a.id, !0))
            }))
        }).on("click", function (a) {
            var e = a.index;
            if (!b.hasArcType() && b.toggleShape) {
                if (b.cancelClick)return void(b.cancelClick = !1);
                b.isStepType(a) && "step-after" === d.line_step_type && c.mouse(this)[0] < b.x(b.getXValue(a.id, e)) && (e -= 1), b.main.selectAll("." + i.shape + "-" + e).each(function (a) {
                    (d.data_selection_grouped || b.isWithinShape(this, a)) && (b.toggleShape(this, a, e), b.config.data_onclick.call(b.api, a, this))
                })
            }
        }).call(c.behavior.drag().origin(Object).on("drag", function () {
            b.drag(c.mouse(this))
        }).on("dragstart", function () {
            b.dragstart(c.mouse(this))
        }).on("dragend", function () {
            b.dragend()
        }))
    },f.generateEventRectsForMultipleXs = function (a) {
        function b() {
            c.svg.select("." + i.eventRect).style("cursor", null), c.hideXGridFocus(), c.hideTooltip(), c.unexpandCircles(), c.unexpandBars()
        }

        var c = this, d = c.d3, e = c.config;
        a.append("rect").attr("x", 0).attr("y", 0).attr("width", c.width).attr("height", c.height).attr("class", i.eventRect).on("mouseout", function () {
            c.hasArcType() || b()
        }).on("mousemove", function () {
            var a, f, g, h, j = c.filterTargetsToShow(c.data.targets);
            if (!c.dragging && !c.hasArcType(j)) {
                if (a = d.mouse(this), f = c.findClosestFromTargets(j, a), !c.mouseover || f && f.id === c.mouseover.id || (e.data_onmouseout.call(c.api, c.mouseover), c.mouseover = void 0), !f)return void b();
                g = c.isScatterType(f) || !e.tooltip_grouped ? [f] : c.filterByX(j, f.x), h = g.map(function (a) {
                    return c.addName(a)
                }), c.showTooltip(h, a), e.point_focus_expand_enabled && c.expandCircles(f.index, f.id, !0), c.expandBars(f.index, f.id, !0), c.showXGridFocus(h), (c.isBarType(f.id) || c.dist(f, a) < 100) && (c.svg.select("." + i.eventRect).style("cursor", "pointer"), c.mouseover || (e.data_onmouseover.call(c.api, f), c.mouseover = f))
            }
        }).on("click", function () {
            var a, b, f = c.filterTargetsToShow(c.data.targets);
            c.hasArcType(f) || (a = d.mouse(this), b = c.findClosestFromTargets(f, a), b && (c.isBarType(b.id) || c.dist(b, a) < 100) && c.main.selectAll("." + i.shapes + c.getTargetSelectorSuffix(b.id)).select("." + i.shape + "-" + b.index).each(function () {
                (e.data_selection_grouped || c.isWithinShape(this, b)) && (c.toggleShape(this, b, b.index), c.config.data_onclick.call(c.api, b, this))
            }))
        }).call(d.behavior.drag().origin(Object).on("drag", function () {
            c.drag(d.mouse(this))
        }).on("dragstart", function () {
            c.dragstart(d.mouse(this))
        }).on("dragend", function () {
            c.dragend()
        }))
    },f.dispatchEvent = function (b, c, d) {
        var e = this, f = "." + i.eventRect + (e.isMultipleX() ? "" : "-" + c), g = e.main.select(f).node(), h = g.getBoundingClientRect(), j = h.left + (d ? d[0] : 0), k = h.top + (d ? d[1] : 0), l = document.createEvent("MouseEvents");
        l.initMouseEvent(b, !0, !0, a, 0, j, k, j, k, !1, !1, !1, !1, 0, null), g.dispatchEvent(l)
    },f.getCurrentWidth = function () {
        var a = this, b = a.config;
        return b.size_width ? b.size_width : a.getParentWidth()
    },f.getCurrentHeight = function () {
        var a = this, b = a.config, c = b.size_height ? b.size_height : a.getParentHeight();
        return c > 0 ? c : 320 / (a.hasType("gauge") ? 2 : 1)
    },f.getCurrentPaddingTop = function () {
        var a = this.config;
        return j(a.padding_top) ? a.padding_top : 0
    },f.getCurrentPaddingBottom = function () {
        var a = this.config;
        return j(a.padding_bottom) ? a.padding_bottom : 0
    },f.getCurrentPaddingLeft = function (a) {
        var b = this, c = b.config;
        return j(c.padding_left) ? c.padding_left : c.axis_rotated ? c.axis_x_show ? Math.max(o(b.getAxisWidthByAxisId("x", a)), 40) : 1 : !c.axis_y_show || c.axis_y_inner ? b.getYAxisLabelPosition().isOuter ? 30 : 1 : o(b.getAxisWidthByAxisId("y", a))
    },f.getCurrentPaddingRight = function () {
        var a = this, b = a.config, c = 10, d = a.isLegendRight ? a.getLegendWidth() + 20 : 0;
        return j(b.padding_right) ? b.padding_right + 1 : b.axis_rotated ? c + d : !b.axis_y2_show || b.axis_y2_inner ? 2 + d + (a.getY2AxisLabelPosition().isOuter ? 20 : 0) : o(a.getAxisWidthByAxisId("y2")) + d
    },f.getParentRectValue = function (a) {
        for (var b, c = this.selectChart.node(); c && "BODY" !== c.tagName && !(b = c.getBoundingClientRect()[a]);)c = c.parentNode;
        return b
    },f.getParentWidth = function () {
        return this.getParentRectValue("width")
    },f.getParentHeight = function () {
        var a = this.selectChart.style("height");
        return a.indexOf("px") > 0 ? +a.replace("px", "") : 0
    },f.getSvgLeft = function (a) {
        var b = this, c = b.config, d = c.axis_rotated || !c.axis_rotated && !c.axis_y_inner, e = c.axis_rotated ? i.axisX : i.axisY, f = b.main.select("." + e).node(), g = f && d ? f.getBoundingClientRect() : {right: 0}, h = b.selectChart.node().getBoundingClientRect(), j = b.hasArcType(), k = g.right - h.left - (j ? 0 : b.getCurrentPaddingLeft(a));
        return k > 0 ? k : 0
    },f.getAxisWidthByAxisId = function (a, b) {
        var c = this, d = c.getAxisLabelPositionById(a);
        return c.getMaxTickWidth(a, b) + (d.isInner ? 20 : 40)
    },f.getHorizontalAxisHeight = function (a) {
        var b = this, c = b.config, d = 30;
        return "x" !== a || c.axis_x_show ? "x" === a && c.axis_x_height ? c.axis_x_height : "y" !== a || c.axis_y_show ? "y2" !== a || c.axis_y2_show ? ("x" === a && !c.axis_rotated && c.axis_x_tick_rotate && (d = b.getMaxTickWidth(a) * Math.cos(Math.PI * (90 - c.axis_x_tick_rotate) / 180)), d + (b.getAxisLabelPositionById(a).isInner ? 0 : 10) + ("y2" === a ? -10 : 0)) : b.rotated_padding_top : !c.legend_show || b.isLegendRight || b.isLegendInset ? 1 : 10 : 8
    },f.getEventRectWidth = function () {
        var a, b, c, d, e, f, g = this, h = g.getMaxDataCountTarget(g.data.targets);
        return h ? (a = h.values[0], b = h.values[h.values.length - 1], c = g.x(b.x) - g.x(a.x), 0 === c ? g.config.axis_rotated ? g.height : g.width : (d = g.getMaxDataCount(), e = g.hasType("bar") ? (d - (g.isCategorized() ? .25 : 1)) / d : 1, f = d > 1 ? c * e / (d - 1) : c, 1 > f ? 1 : f)) : 0
    },f.getShapeIndices = function (a) {
        var b, c, d = this, e = d.config, f = {}, g = 0;
        return d.filterTargetsToShow(d.data.targets.filter(a, d)).forEach(function (a) {
            for (b = 0; b < e.data_groups.length; b++)if (!(e.data_groups[b].indexOf(a.id) < 0))for (c = 0; c < e.data_groups[b].length; c++)if (e.data_groups[b][c]in f) {
                f[a.id] = f[e.data_groups[b][c]];
                break
            }
            m(f[a.id]) && (f[a.id] = g++)
        }), f.__max__ = g - 1, f
    },f.getShapeX = function (a, b, c, d) {
        var e = this, f = d ? e.subX : e.x;
        return function (d) {
            var e = d.id in c ? c[d.id] : 0;
            return d.x || 0 === d.x ? f(d.x) - a * (b / 2 - e) : 0
        }
    },f.getShapeY = function (a) {
        var b = this;
        return function (c) {
            var d = a ? b.getSubYScale(c.id) : b.getYScale(c.id);
            return d(c.value)
        }
    },f.getShapeOffset = function (a, b, c) {
        var d = this, e = d.orderTargets(d.filterTargetsToShow(d.data.targets.filter(a, d))), f = e.map(function (a) {
            return a.id
        });
        return function (a, g) {
            var h = c ? d.getSubYScale(a.id) : d.getYScale(a.id), i = h(0), j = i;
            return e.forEach(function (c) {
                var e = d.isStepType(a) ? d.convertValuesToStep(c.values) : c.values;
                c.id !== a.id && b[c.id] === b[a.id] && f.indexOf(c.id) < f.indexOf(a.id) && e[g].value * a.value >= 0 && (j += h(e[g].value) - i)
            }), j
        }
    },f.isWithinShape = function (a, b) {
        var c, d = this, e = d.d3.select(a);
        return d.isTargetToShow(b.id) ? "circle" === a.nodeName ? c = d.isStepType(b) ? d.isWithinStep(a, d.getYScale(b.id)(b.value)) : d.isWithinCircle(a, 1.5 * d.pointSelectR(b)) : "path" === a.nodeName && (c = e.classed(i.bar) ? d.isWithinBar(a) : !0) : c = !1, c
    },f.getInterpolate = function (a) {
        var b = this;
        return b.isSplineType(a) ? "cardinal" : b.isStepType(a) ? b.config.line_step_type : "linear"
    },f.initLine = function () {
        var a = this;
        a.main.select("." + i.chart).append("g").attr("class", i.chartLines)
    },f.updateTargetsForLine = function (a) {
        var b, c, d = this, e = d.config, f = d.classChartLine.bind(d), g = d.classLines.bind(d), h = d.classAreas.bind(d), j = d.classCircles.bind(d), k = d.classFocus.bind(d);
        b = d.main.select("." + i.chartLines).selectAll("." + i.chartLine).data(a).attr("class", function (a) {
            return f(a) + k(a)
        }), c = b.enter().append("g").attr("class", f).style("opacity", 0).style("pointer-events", "none"), c.append("g").attr("class", g), c.append("g").attr("class", h), c.append("g").attr("class", function (a) {
            return d.generateClass(i.selectedCircles, a.id)
        }), c.append("g").attr("class", j).style("cursor", function (a) {
            return e.data_selection_isselectable(a) ? "pointer" : null
        }), a.forEach(function (a) {
            d.main.selectAll("." + i.selectedCircles + d.getTargetSelectorSuffix(a.id)).selectAll("." + i.selectedCircle).each(function (b) {
                b.value = a.values[b.index].value
            })
        })
    },f.redrawLine = function (a) {
        var b = this;
        b.mainLine = b.main.selectAll("." + i.lines).selectAll("." + i.line).data(b.lineData.bind(b)), b.mainLine.enter().append("path").attr("class", b.classLine.bind(b)).style("stroke", b.color), b.mainLine.style("opacity", b.initialOpacity.bind(b)).style("shape-rendering", function (a) {
            return b.isStepType(a) ? "crispEdges" : ""
        }).attr("transform", null), b.mainLine.exit().transition().duration(a).style("opacity", 0).remove()
    },f.addTransitionForLine = function (a, b) {
        var c = this;
        a.push(c.mainLine.transition().attr("d", b).style("stroke", c.color).style("opacity", 1))
    },f.generateDrawLine = function (a, b) {
        var c = this, d = c.config, e = c.d3.svg.line(), f = c.generateGetLinePoints(a, b), g = b ? c.getSubYScale : c.getYScale, h = function (a) {
            return (b ? c.subxx : c.xx).call(c, a)
        }, i = function (a, b) {
            return d.data_groups.length > 0 ? f(a, b)[0][1] : g.call(c, a.id)(a.value)
        };
        return e = d.axis_rotated ? e.x(i).y(h) : e.x(h).y(i), d.line_connectNull || (e = e.defined(function (a) {
            return null != a.value
        })), function (a) {
            var f, h = d.line_connectNull ? c.filterRemoveNull(a.values) : a.values, i = b ? c.x : c.subX, j = g.call(c, a.id), k = 0, l = 0;
            return c.isLineType(a) ? d.data_regions[a.id] ? f = c.lineWithRegions(h, i, j, d.data_regions[a.id]) : (c.isStepType(a) && (h = c.convertValuesToStep(h)), f = e.interpolate(c.getInterpolate(a))(h)) : (h[0] && (k = i(h[0].x), l = j(h[0].value)), f = d.axis_rotated ? "M " + l + " " + k : "M " + k + " " + l), f ? f : "M 0 0"
        }
    },f.generateGetLinePoints = function (a, b) {
        var c = this, d = c.config, e = a.__max__ + 1, f = c.getShapeX(0, e, a, !!b), g = c.getShapeY(!!b), h = c.getShapeOffset(c.isLineType, a, !!b), i = b ? c.getSubYScale : c.getYScale;
        return function (a, b) {
            var e = i.call(c, a.id)(0), j = h(a, b) || e, k = f(a), l = g(a);
            return d.axis_rotated && (0 < a.value && e > l || a.value < 0 && l > e) && (l = e), [[k, l - (e - j)], [k, l - (e - j)], [k, l - (e - j)], [k, l - (e - j)]]
        }
    },f.lineWithRegions = function (a, b, c, d) {
        function e(a, b) {
            var c;
            for (c = 0; c < b.length; c++)if (b[c].start < a && a <= b[c].end)return !0;
            return !1
        }

        var f, g, h, i, j, k, l, o, p, q, r, s, t = this, u = t.config, v = -1, w = "M", x = [];
        if (n(d))for (f = 0; f < d.length; f++)x[f] = {}, x[f].start = m(d[f].start) ? a[0].x : t.isTimeSeries() ? t.parseDate(d[f].start) : d[f].start, x[f].end = m(d[f].end) ? a[a.length - 1].x : t.isTimeSeries() ? t.parseDate(d[f].end) : d[f].end;
        for (r = u.axis_rotated ? function (a) {
            return c(a.value)
        } : function (a) {
            return b(a.x)
        }, s = u.axis_rotated ? function (a) {
            return b(a.x)
        } : function (a) {
            return c(a.value)
        }, h = t.isTimeSeries() ? function (a, d, e, f) {
            var g = a.x.getTime(), h = d.x - a.x, i = new Date(g + h * e), k = new Date(g + h * (e + f));
            return "M" + b(i) + " " + c(j(e)) + " " + b(k) + " " + c(j(e + f))
        } : function (a, d, e, f) {
            return "M" + b(i(e), !0) + " " + c(j(e)) + " " + b(i(e + f), !0) + " " + c(j(e + f))
        }, f = 0; f < a.length; f++) {
            if (m(x) || !e(a[f].x, x))w += " " + r(a[f]) + " " + s(a[f]); else for (i = t.getScale(a[f - 1].x, a[f].x, t.isTimeSeries()), j = t.getScale(a[f - 1].value, a[f].value), k = b(a[f].x) - b(a[f - 1].x), l = c(a[f].value) - c(a[f - 1].value), o = Math.sqrt(Math.pow(k, 2) + Math.pow(l, 2)), p = 2 / o, q = 2 * p, g = p; 1 >= g; g += q)w += h(a[f - 1], a[f], g, p);
            v = a[f].x
        }
        return w
    },f.redrawArea = function (a) {
        var b = this, c = b.d3;
        b.mainArea = b.main.selectAll("." + i.areas).selectAll("." + i.area).data(b.lineData.bind(b)), b.mainArea.enter().append("path").attr("class", b.classArea.bind(b)).style("fill", b.color).style("opacity", function () {
            return b.orgAreaOpacity = +c.select(this).style("opacity"), 0
        }), b.mainArea.style("opacity", b.orgAreaOpacity), b.mainArea.exit().transition().duration(a).style("opacity", 0).remove()
    },f.addTransitionForArea = function (a, b) {
        var c = this;
        a.push(c.mainArea.transition().attr("d", b).style("fill", c.color).style("opacity", c.orgAreaOpacity))
    },f.generateDrawArea = function (a, b) {
        var c = this, d = c.config, e = c.d3.svg.area(), f = c.generateGetAreaPoints(a, b), g = b ? c.getSubYScale : c.getYScale, h = function (a) {
            return (b ? c.subxx : c.xx).call(c, a)
        }, i = function (a, b) {
            return d.data_groups.length > 0 ? f(a, b)[0][1] : g.call(c, a.id)(0)
        }, j = function (a, b) {
            return d.data_groups.length > 0 ? f(a, b)[1][1] : g.call(c, a.id)(a.value)
        };
        return e = d.axis_rotated ? e.x0(i).x1(j).y(h) : e.x(h).y0(i).y1(j), d.line_connectNull || (e = e.defined(function (a) {
            return null !== a.value
        })), function (a) {
            var b, f = d.line_connectNull ? c.filterRemoveNull(a.values) : a.values, g = 0, h = 0;
            return c.isAreaType(a) ? (c.isStepType(a) && (f = c.convertValuesToStep(f)), b = e.interpolate(c.getInterpolate(a))(f)) : (f[0] && (g = c.x(f[0].x), h = c.getYScale(a.id)(f[0].value)), b = d.axis_rotated ? "M " + h + " " + g : "M " + g + " " + h), b ? b : "M 0 0"
        }
    },f.generateGetAreaPoints = function (a, b) {
        var c = this, d = c.config, e = a.__max__ + 1, f = c.getShapeX(0, e, a, !!b), g = c.getShapeY(!!b), h = c.getShapeOffset(c.isAreaType, a, !!b), i = b ? c.getSubYScale : c.getYScale;
        return function (a, b) {
            var e = i.call(c, a.id)(0), j = h(a, b) || e, k = f(a), l = g(a);
            return d.axis_rotated && (0 < a.value && e > l || a.value < 0 && l > e) && (l = e), [[k, j], [k, l - (e - j)], [k, l - (e - j)], [k, j]]
        }
    },f.redrawCircle = function () {
        var a = this;
        a.mainCircle = a.main.selectAll("." + i.circles).selectAll("." + i.circle).data(a.lineOrScatterData.bind(a)), a.mainCircle.enter().append("circle").attr("class", a.classCircle.bind(a)).attr("r", a.pointR.bind(a)).style("fill", a.color), a.mainCircle.style("opacity", a.initialOpacityForCircle.bind(a)), a.mainCircle.exit().remove()
    },f.addTransitionForCircle = function (a, b, c) {
        var d = this;
        a.push(d.mainCircle.transition().style("opacity", d.opacityForCircle.bind(d)).style("fill", d.color).attr("cx", b).attr("cy", c)), a.push(d.main.selectAll("." + i.selectedCircle).transition().attr("cx", b).attr("cy", c))
    },f.circleX = function (a) {
        return a.x || 0 === a.x ? this.x(a.x) : null
    },f.updateCircleY = function () {
        var a, b, c = this;
        c.config.data_groups.length > 0 ? (a = c.getShapeIndices(c.isLineType), b = c.generateGetLinePoints(a), c.circleY = function (a, c) {
            return b(a, c)[0][1]
        }) : c.circleY = function (a) {
            return c.getYScale(a.id)(a.value)
        }
    },f.getCircles = function (a, b) {
        var c = this;
        return (b ? c.main.selectAll("." + i.circles + c.getTargetSelectorSuffix(b)) : c.main).selectAll("." + i.circle + (j(a) ? "-" + a : ""))
    },f.expandCircles = function (a, b, c) {
        var d = this, e = d.pointExpandedR.bind(d);
        c && d.unexpandCircles(), d.getCircles(a, b).classed(i.EXPANDED, !0).attr("r", e)
    },f.unexpandCircles = function (a) {
        var b = this, c = b.pointR.bind(b);
        b.getCircles(a).filter(function () {
            return b.d3.select(this).classed(i.EXPANDED)
        }).classed(i.EXPANDED, !1).attr("r", c)
    },f.pointR = function (a) {
        var b = this, c = b.config;
        return b.isStepType(a) ? 0 : k(c.point_r) ? c.point_r(a) : c.point_r
    },f.pointExpandedR = function (a) {
        var b = this, c = b.config;
        return c.point_focus_expand_enabled ? c.point_focus_expand_r ? c.point_focus_expand_r : 1.75 * b.pointR(a) : b.pointR(a)
    },f.pointSelectR = function (a) {
        var b = this, c = b.config;
        return c.point_select_r ? c.point_select_r : 4 * b.pointR(a)
    },f.isWithinCircle = function (a, b) {
        var c = this.d3, d = c.mouse(a), e = c.select(a), f = +e.attr("cx"), g = +e.attr("cy");
        return Math.sqrt(Math.pow(f - d[0], 2) + Math.pow(g - d[1], 2)) < b
    },f.isWithinStep = function (a, b) {
        return Math.abs(b - this.d3.mouse(a)[1]) < 30
    },f.initBar = function () {
        var a = this;
        a.main.select("." + i.chart).append("g").attr("class", i.chartBars)
    },f.updateTargetsForBar = function (a) {
        var b, c, d = this, e = d.config, f = d.classChartBar.bind(d), g = d.classBars.bind(d), h = d.classFocus.bind(d);
        b = d.main.select("." + i.chartBars).selectAll("." + i.chartBar).data(a).attr("class", function (a) {
            return f(a) + h(a)
        }), c = b.enter().append("g").attr("class", f).style("opacity", 0).style("pointer-events", "none"), c.append("g").attr("class", g).style("cursor", function (a) {
            return e.data_selection_isselectable(a) ? "pointer" : null
        })
    },f.redrawBar = function (a) {
        var b = this, c = b.barData.bind(b), d = b.classBar.bind(b), e = b.initialOpacity.bind(b), f = function (a) {
            return b.color(a.id)
        };
        b.mainBar = b.main.selectAll("." + i.bars).selectAll("." + i.bar).data(c), b.mainBar.enter().append("path").attr("class", d).style("stroke", f).style("fill", f), b.mainBar.style("opacity", e), b.mainBar.exit().transition().duration(a).style("opacity", 0).remove()
    },f.addTransitionForBar = function (a, b) {
        var c = this;
        a.push(c.mainBar.transition().attr("d", b).style("fill", c.color).style("opacity", 1))
    },f.getBarW = function (a, b) {
        var c = this, d = c.config, e = "number" == typeof d.bar_width ? d.bar_width : b ? 2 * a.tickOffset() * d.bar_width_ratio / b : 0;
        return d.bar_width_max && e > d.bar_width_max ? d.bar_width_max : e
    },f.getBars = function (a, b) {
        var c = this;
        return (b ? c.main.selectAll("." + i.bars + c.getTargetSelectorSuffix(b)) : c.main).selectAll("." + i.bar + (j(a) ? "-" + a : ""))
    },f.expandBars = function (a, b, c) {
        var d = this;
        c && d.unexpandBars(), d.getBars(a, b).classed(i.EXPANDED, !0)
    },f.unexpandBars = function (a) {
        var b = this;
        b.getBars(a).classed(i.EXPANDED, !1)
    },f.generateDrawBar = function (a, b) {
        var c = this, d = c.config, e = c.generateGetBarPoints(a, b);
        return function (a, b) {
            var c = e(a, b), f = d.axis_rotated ? 1 : 0, g = d.axis_rotated ? 0 : 1, h = "M " + c[0][f] + "," + c[0][g] + " L" + c[1][f] + "," + c[1][g] + " L" + c[2][f] + "," + c[2][g] + " L" + c[3][f] + "," + c[3][g] + " z";
            return h
        }
    },f.generateGetBarPoints = function (a, b) {
        var c = this, d = b ? c.subXAxis : c.xAxis, e = a.__max__ + 1, f = c.getBarW(d, e), g = c.getShapeX(f, e, a, !!b), h = c.getShapeY(!!b), i = c.getShapeOffset(c.isBarType, a, !!b), j = b ? c.getSubYScale : c.getYScale;
        return function (a, b) {
            var d = j.call(c, a.id)(0), e = i(a, b) || d, k = g(a), l = h(a);
            return c.config.axis_rotated && (0 < a.value && d > l || a.value < 0 && l > d) && (l = d), [[k, e], [k, l - (d - e)], [k + f, l - (d - e)], [k + f, e]]
        }
    },f.isWithinBar = function (a) {
        var b = this.d3.mouse(a), c = a.getBoundingClientRect(), d = a.pathSegList.getItem(0), e = a.pathSegList.getItem(1), f = Math.min(d.x, e.x), g = Math.min(d.y, e.y), h = c.width, i = c.height, j = 2, k = f - j, l = f + h + j, m = g + i + j, n = g - j;
        return k < b[0] && b[0] < l && n < b[1] && b[1] < m
    },f.initText = function () {
        var a = this;
        a.main.select("." + i.chart).append("g").attr("class", i.chartTexts), a.mainText = a.d3.selectAll([])
    },f.updateTargetsForText = function (a) {
        var b, c, d = this, e = d.classChartText.bind(d), f = d.classTexts.bind(d), g = d.classFocus.bind(d);
        b = d.main.select("." + i.chartTexts).selectAll("." + i.chartText).data(a).attr("class", function (a) {
            return e(a) + g(a)
        }), c = b.enter().append("g").attr("class", e).style("opacity", 0).style("pointer-events", "none"), c.append("g").attr("class", f)
    },f.redrawText = function (a) {
        var b = this, c = b.config, d = b.barOrLineData.bind(b), e = b.classText.bind(b);
        b.mainText = b.main.selectAll("." + i.texts).selectAll("." + i.text).data(d), b.mainText.enter().append("text").attr("class", e).attr("text-anchor", function (a) {
            return c.axis_rotated ? a.value < 0 ? "end" : "start" : "middle"
        }).style("stroke", "none").style("fill", function (a) {
            return b.color(a)
        }).style("fill-opacity", 0), b.mainText.text(function (a, c, d) {
            return b.formatByAxisId(b.getAxisId(a.id))(a.value, a.id, c, d)
        }), b.mainText.exit().transition().duration(a).style("fill-opacity", 0).remove()
    },f.addTransitionForText = function (a, b, c, d) {
        var e = this, f = d ? 0 : e.opacityForText.bind(e);
        a.push(e.mainText.transition().attr("x", b).attr("y", c).style("fill", e.color).style("fill-opacity", f))
    },f.getTextRect = function (a, b) {
        var c, d = this.d3.select("body").classed("c3", !0), e = d.append("svg").style("visibility", "hidden");
        return e.selectAll(".dummy").data([a]).enter().append("text").classed(b ? b : "", !0).text(a).each(function () {
            c = this.getBoundingClientRect()
        }), e.remove(), d.classed("c3", !1), c
    },f.generateXYForText = function (a, b, c, d) {
        var e = this, f = e.generateGetAreaPoints(b, !1), g = e.generateGetBarPoints(b, !1), h = e.generateGetLinePoints(c, !1), i = d ? e.getXForText : e.getYForText;
        return function (a, b) {
            var c = e.isAreaType(a) ? f : e.isBarType(a) ? g : h;
            return i.call(e, c(a, b), a, this)
        }
    },f.getXForText = function (a, b, c) {
        var d, e, f = this, g = c.getBoundingClientRect();
        return f.config.axis_rotated ? (e = f.isBarType(b) ? 4 : 6, d = a[2][1] + e * (b.value < 0 ? -1 : 1)) : d = f.hasType("bar") ? (a[2][0] + a[0][0]) / 2 : a[0][0], null === b.value && (d > f.width ? d = f.width - g.width : 0 > d && (d = 4)), d
    },f.getYForText = function (a, b, c) {
        var d, e = this, f = c.getBoundingClientRect();
        return d = e.config.axis_rotated ? (a[0][0] + a[2][0] + .6 * f.height) / 2 : a[2][1] + (b.value < 0 ? f.height : e.isBarType(b) ? -3 : -6), null !== b.value || e.config.axis_rotated || (d < f.height ? d = f.height : d > this.height && (d = this.height - 4)), d
    },f.setTargetType = function (a, b) {
        var c = this, d = c.config;
        c.mapToTargetIds(a).forEach(function (a) {
            c.withoutFadeIn[a] = b === d.data_types[a], d.data_types[a] = b
        }), a || (d.data_type = b)
    },f.hasType = function (a, b) {
        var c = this, d = c.config.data_types, e = !1;
        return b = b || c.data.targets, b && b.length ? b.forEach(function (b) {
            var c = d[b.id];
            (c && c.indexOf(a) >= 0 || !c && "line" === a) && (e = !0)
        }) : Object.keys(d).length ? Object.keys(d).forEach(function (b) {
            d[b] === a && (e = !0)
        }) : e = c.config.data_type === a, e
    },f.hasArcType = function (a) {
        return this.hasType("pie", a) || this.hasType("donut", a) || this.hasType("gauge", a)
    },f.isLineType = function (a) {
        var b = this.config, c = l(a) ? a : a.id;
        return !b.data_types[c] || ["line", "spline", "area", "area-spline", "step", "area-step"].indexOf(b.data_types[c]) >= 0
    },f.isStepType = function (a) {
        var b = l(a) ? a : a.id;
        return ["step", "area-step"].indexOf(this.config.data_types[b]) >= 0
    },f.isSplineType = function (a) {
        var b = l(a) ? a : a.id;
        return ["spline", "area-spline"].indexOf(this.config.data_types[b]) >= 0
    },f.isAreaType = function (a) {
        var b = l(a) ? a : a.id;
        return ["area", "area-spline", "area-step"].indexOf(this.config.data_types[b]) >= 0
    },f.isBarType = function (a) {
        var b = l(a) ? a : a.id;
        return "bar" === this.config.data_types[b]
    },f.isScatterType = function (a) {
        var b = l(a) ? a : a.id;
        return "scatter" === this.config.data_types[b]
    },f.isPieType = function (a) {
        var b = l(a) ? a : a.id;
        return "pie" === this.config.data_types[b]
    },f.isGaugeType = function (a) {
        var b = l(a) ? a : a.id;
        return "gauge" === this.config.data_types[b]
    },f.isDonutType = function (a) {
        var b = l(a) ? a : a.id;
        return "donut" === this.config.data_types[b]
    },f.isArcType = function (a) {
        return this.isPieType(a) || this.isDonutType(a) || this.isGaugeType(a)
    },f.lineData = function (a) {
        return this.isLineType(a) ? [a] : []
    },f.arcData = function (a) {
        return this.isArcType(a.data) ? [a] : []
    },f.barData = function (a) {
        return this.isBarType(a) ? a.values : []
    },f.lineOrScatterData = function (a) {
        return this.isLineType(a) || this.isScatterType(a) ? a.values : []
    },f.barOrLineData = function (a) {
        return this.isBarType(a) || this.isLineType(a) ? a.values : []
    },f.initGrid = function () {
        var a = this, b = a.config, c = a.d3;
        a.grid = a.main.append("g").attr("clip-path", a.clipPathForGrid).attr("class", i.grid), b.grid_x_show && a.grid.append("g").attr("class", i.xgrids), b.grid_y_show && a.grid.append("g").attr("class", i.ygrids), b.grid_focus_show && a.grid.append("g").attr("class", i.xgridFocus).append("line").attr("class", i.xgridFocus), a.xgrid = c.selectAll([]), b.grid_lines_front || a.initGridLines()
    },f.initGridLines = function () {
        var a = this, b = a.d3;
        a.gridLines = a.main.append("g").attr("clip-path", a.clipPathForGrid).attr("class", i.grid + " " + i.gridLines), a.gridLines.append("g").attr("class", i.xgridLines), a.gridLines.append("g").attr("class", i.ygridLines), a.xgridLines = b.selectAll([])
    },f.updateXGrid = function (a) {
        var b = this, c = b.config, d = b.d3, e = b.generateGridData(c.grid_x_type, b.x), f = b.isCategorized() ? b.xAxis.tickOffset() : 0;
        b.xgridAttr = c.axis_rotated ? {
            x1: 0, x2: b.width, y1: function (a) {
                return b.x(a) - f
            }, y2: function (a) {
                return b.x(a) - f
            }
        } : {
            x1: function (a) {
                return b.x(a) + f
            }, x2: function (a) {
                return b.x(a) + f
            }, y1: 0, y2: b.height
        }, b.xgrid = b.main.select("." + i.xgrids).selectAll("." + i.xgrid).data(e), b.xgrid.enter().append("line").attr("class", i.xgrid), a || b.xgrid.attr(b.xgridAttr).style("opacity", function () {
            return +d.select(this).attr(c.axis_rotated ? "y1" : "x1") === (c.axis_rotated ? b.height : 0) ? 0 : 1
        }), b.xgrid.exit().remove()
    },f.updateYGrid = function () {
        var a = this, b = a.config, c = a.yAxis.tickValues() || a.y.ticks(b.grid_y_ticks);
        a.ygrid = a.main.select("." + i.ygrids).selectAll("." + i.ygrid).data(c), a.ygrid.enter().append("line").attr("class", i.ygrid), a.ygrid.attr("x1", b.axis_rotated ? a.y : 0).attr("x2", b.axis_rotated ? a.y : a.width).attr("y1", b.axis_rotated ? 0 : a.y).attr("y2", b.axis_rotated ? a.height : a.y), a.ygrid.exit().remove(), a.smoothLines(a.ygrid, "grid")
    },f.redrawGrid = function (a) {
        var b, c, d, e = this, f = e.main, g = e.config;
        e.grid.style("visibility", e.hasArcType() ? "hidden" : "visible"), f.select("line." + i.xgridFocus).style("visibility", "hidden"), g.grid_x_show && e.updateXGrid(), e.xgridLines = f.select("." + i.xgridLines).selectAll("." + i.xgridLine).data(g.grid_x_lines), b = e.xgridLines.enter().append("g").attr("class", function (a) {
            return i.xgridLine + (a["class"] ? " " + a["class"] : "")
        }), b.append("line").style("opacity", 0), b.append("text").attr("text-anchor", "end").attr("transform", g.axis_rotated ? "" : "rotate(-90)").attr("dx", g.axis_rotated ? 0 : -e.margin.top).attr("dy", -5).style("opacity", 0), e.xgridLines.exit().transition().duration(a).style("opacity", 0).remove(), g.grid_y_show && e.updateYGrid(), e.ygridLines = f.select("." + i.ygridLines).selectAll("." + i.ygridLine).data(g.grid_y_lines), c = e.ygridLines.enter().append("g").attr("class", function (a) {
            return i.ygridLine + (a["class"] ? " " + a["class"] : "")
        }), c.append("line").style("opacity", 0), c.append("text").attr("text-anchor", "end").attr("transform", g.axis_rotated ? "rotate(-90)" : "").attr("dx", g.axis_rotated ? 0 : -e.margin.top).attr("dy", -5).style("opacity", 0), d = e.yv.bind(e), e.ygridLines.select("line").transition().duration(a).attr("x1", g.axis_rotated ? d : 0).attr("x2", g.axis_rotated ? d : e.width).attr("y1", g.axis_rotated ? 0 : d).attr("y2", g.axis_rotated ? e.height : d).style("opacity", 1), e.ygridLines.select("text").transition().duration(a).attr("x", g.axis_rotated ? 0 : e.width).attr("y", d).text(function (a) {
            return a.text
        }).style("opacity", 1), e.ygridLines.exit().transition().duration(a).style("opacity", 0).remove()
    },f.addTransitionForGrid = function (a) {
        var b = this, c = b.config, d = b.xv.bind(b);
        a.push(b.xgridLines.select("line").transition().attr("x1", c.axis_rotated ? 0 : d).attr("x2", c.axis_rotated ? b.width : d).attr("y1", c.axis_rotated ? d : b.margin.top).attr("y2", c.axis_rotated ? d : b.height).style("opacity", 1)), a.push(b.xgridLines.select("text").transition().attr("x", c.axis_rotated ? b.width : 0).attr("y", d).text(function (a) {
            return a.text
        }).style("opacity", 1))
    },f.showXGridFocus = function (a) {
        var b = this, c = b.config, d = a.filter(function (a) {
            return a && j(a.value)
        }), e = b.main.selectAll("line." + i.xgridFocus), f = b.xx.bind(b);
        c.tooltip_show && (b.hasType("scatter") || b.hasArcType() || (e.style("visibility", "visible").data([d[0]]).attr(c.axis_rotated ? "y1" : "x1", f).attr(c.axis_rotated ? "y2" : "x2", f), b.smoothLines(e, "grid")))
    },f.hideXGridFocus = function () {
        this.main.select("line." + i.xgridFocus).style("visibility", "hidden")
    },f.updateXgridFocus = function () {
        var a = this, b = a.config;
        a.main.select("line." + i.xgridFocus).attr("x1", b.axis_rotated ? 0 : -10).attr("x2", b.axis_rotated ? a.width : -10).attr("y1", b.axis_rotated ? -10 : 0).attr("y2", b.axis_rotated ? -10 : a.height)
    },f.generateGridData = function (a, b) {
        var c, d, e, f, g = this, h = [], j = g.main.select("." + i.axisX).selectAll(".tick").size();
        if ("year" === a)for (c = g.getXDomain(), d = c[0].getFullYear(), e = c[1].getFullYear(), f = d; e >= f; f++)h.push(new Date(f + "-01-01 00:00:00")); else h = b.ticks(10), h.length > j && (h = h.filter(function (a) {
            return ("" + a).indexOf(".") < 0
        }));
        return h
    },f.getGridFilterToRemove = function (a) {
        return a ? function (b) {
            var c = !1;
            return [].concat(a).forEach(function (a) {
                ("value"in a && b.value === a.value || "class"in a && b["class"] === a["class"]) && (c = !0)
            }), c
        } : function () {
            return !0
        }
    },f.removeGridLines = function (a, b) {
        var c = this, d = c.config, e = c.getGridFilterToRemove(a), f = function (a) {
            return !e(a)
        }, g = b ? i.xgridLines : i.ygridLines, h = b ? i.xgridLine : i.ygridLine;
        c.main.select("." + g).selectAll("." + h).filter(e).transition().duration(d.transition_duration).style("opacity", 0).remove(), b ? d.grid_x_lines = d.grid_x_lines.filter(f) : d.grid_y_lines = d.grid_y_lines.filter(f)
    },f.initTooltip = function () {
        var a, b = this, c = b.config;
        if (b.tooltip = b.selectChart.style("position", "relative").append("div").attr("class", i.tooltipContainer).style("position", "absolute").style("pointer-events", "none").style("display", "none"), c.tooltip_init_show) {
            if (b.isTimeSeries() && l(c.tooltip_init_x)) {
                for (c.tooltip_init_x = b.parseDate(c.tooltip_init_x), a = 0; a < b.data.targets[0].values.length && b.data.targets[0].values[a].x - c.tooltip_init_x !== 0; a++);
                c.tooltip_init_x = a
            }
            b.tooltip.html(c.tooltip_contents.call(b, b.data.targets.map(function (a) {
                return b.addName(a.values[c.tooltip_init_x])
            }), b.getXAxisTickFormat(), b.getYFormat(b.hasArcType()), b.color)), b.tooltip.style("top", c.tooltip_init_position.top).style("left", c.tooltip_init_position.left).style("display", "block")
        }
    },f.getTooltipContent = function (a, b, c, d) {
        var e, f, g, h, j, k, l = this, m = l.config, n = m.tooltip_format_title || b, o = m.tooltip_format_name || function (a) {
                return a
            }, p = m.tooltip_format_value || c;
        for (f = 0; f < a.length; f++)a[f] && (a[f].value || 0 === a[f].value) && (e || (g = n ? n(a[f].x) : a[f].x, e = "<table class='" + i.tooltip + "'>" + (g || 0 === g ? "<tr><th colspan='2'>" + g + "</th></tr>" : "")), j = o(a[f].name, a[f].ratio, a[f].id, a[f].index), h = p(a[f].value, a[f].ratio, a[f].id, a[f].index), k = l.levelColor ? l.levelColor(a[f].value) : d(a[f].id), e += "<tr class='" + i.tooltipName + "-" + a[f].id + "'>", e += "<td class='name'><span style='background-color:" + k + "'></span>" + j + "</td>", e += "<td class='value'>" + h + "</td>", e += "</tr>");
        return e + "</table>"
    },f.showTooltip = function (a, b) {
        var c, d, e, f, g, h, i, k = this, l = k.config, m = k.hasArcType(), n = a.filter(function (a) {
            return a && j(a.value)
        });
        0 !== n.length && l.tooltip_show && (k.tooltip.html(l.tooltip_contents.call(k, a, k.getXAxisTickFormat(), k.getYFormat(m), k.color)).style("display", "block"), c = k.tooltip.property("offsetWidth"), d = k.tooltip.property("offsetHeight"), m ? (f = k.width / 2 + b[0], h = k.height / 2 + b[1] + 20) : (e = k.getSvgLeft(!0), l.axis_rotated ? (f = e + b[0] + 100, g = f + c, i = k.currentWidth - k.getCurrentPaddingRight(), h = k.x(n[0].x) + 20) : (f = e + k.getCurrentPaddingLeft(!0) + k.x(n[0].x) + 20, g = f + c, i = e + k.currentWidth - k.getCurrentPaddingRight(), h = b[1] + 15), g > i && (f -= g - i), h + d > k.currentHeight && (h -= d + 30)), 0 > h && (h = 0), k.tooltip.style("top", h + "px").style("left", f + "px"))
    },f.hideTooltip = function () {
        this.tooltip.style("display", "none")
    },f.initLegend = function () {
        var a = this;
        return a.legendHasRendered = !1, a.legend = a.svg.append("g").attr("transform", a.getTranslate("legend")), a.config.legend_show ? void a.updateLegendWithDefaults() : (a.legend.style("visibility", "hidden"), void(a.hiddenLegendIds = a.mapToIds(a.data.targets)))
    },f.updateLegendWithDefaults = function () {
        var a = this;
        a.updateLegend(a.mapToIds(a.data.targets), {
            withTransform: !1,
            withTransitionForTransform: !1,
            withTransition: !1
        })
    },f.updateSizeForLegend = function (a, b) {
        var c = this, d = c.config, e = {
            top: c.isLegendTop ? c.getCurrentPaddingTop() + d.legend_inset_y + 5.5 : c.currentHeight - a - c.getCurrentPaddingBottom() - d.legend_inset_y,
            left: c.isLegendLeft ? c.getCurrentPaddingLeft() + d.legend_inset_x + .5 : c.currentWidth - b - c.getCurrentPaddingRight() - d.legend_inset_x + .5
        };
        c.margin3 = {
            top: c.isLegendRight ? 0 : c.isLegendInset ? e.top : c.currentHeight - a,
            right: 0 / 0,
            bottom: 0,
            left: c.isLegendRight ? c.currentWidth - b : c.isLegendInset ? e.left : 0
        }
    },f.transformLegend = function (a) {
        var b = this;
        (a ? b.legend.transition() : b.legend).attr("transform", b.getTranslate("legend"))
    },f.updateLegendStep = function (a) {
        this.legendStep = a
    },f.updateLegendItemWidth = function (a) {
        this.legendItemWidth = a
    },f.updateLegendItemHeight = function (a) {
        this.legendItemHeight = a
    },f.getLegendWidth = function () {
        var a = this;
        return a.config.legend_show ? a.isLegendRight || a.isLegendInset ? a.legendItemWidth * (a.legendStep + 1) : a.currentWidth : 0
    },f.getLegendHeight = function () {
        var a = this, b = 0;
        return a.config.legend_show && (b = a.isLegendRight ? a.currentHeight : Math.max(20, a.legendItemHeight) * (a.legendStep + 1)), b
    },f.opacityForLegend = function (a) {
        return a.classed(i.legendItemHidden) ? null : 1
    },f.opacityForUnfocusedLegend = function (a) {
        return a.classed(i.legendItemHidden) ? null : .3
    },f.toggleFocusLegend = function (a, b) {
        var c = this;
        a = c.mapToTargetIds(a), c.legend.selectAll("." + i.legendItem).filter(function (b) {
            return a.indexOf(b) >= 0
        }).classed(i.legendItemFocused, b).transition().duration(100).style("opacity", function () {
            var a = b ? c.opacityForLegend : c.opacityForUnfocusedLegend;
            return a.call(c, c.d3.select(this))
        })
    },f.revertLegend = function () {
        var a = this, b = a.d3;
        a.legend.selectAll("." + i.legendItem).classed(i.legendItemFocused, !1).transition().duration(100).style("opacity", function () {
            return a.opacityForLegend(b.select(this))
        })
    },f.showLegend = function (a) {
        var b = this, c = b.config;
        c.legend_show || (c.legend_show = !0, b.legend.style("visibility", "visible"), b.legendHasRendered || b.updateLegendWithDefaults()), b.removeHiddenLegendIds(a), b.legend.selectAll(b.selectorLegends(a)).style("visibility", "visible").transition().style("opacity", function () {
            return b.opacityForLegend(b.d3.select(this))
        })
    },f.hideLegend = function (a) {
        var b = this, c = b.config;
        c.legend_show && r(a) && (c.legend_show = !1, b.legend.style("visibility", "hidden")), b.addHiddenLegendIds(a), b.legend.selectAll(b.selectorLegends(a)).style("opacity", 0).style("visibility", "hidden")
    };
    var h = {};
    f.clearLegendItemTextBoxCache = function () {
        h = {}
    }, f.updateLegend = function (a, b, c) {
        function d(a, b) {
            return h[b] || (h[b] = w.getTextRect(a.textContent, i.legendItem)), h[b]
        }

        function e(b, c, e) {
            function f(a, b) {
                b || (g = (o - E - n) / 2, C > g && (g = (o - n) / 2, E = 0, K++)), J[a] = K, I[K] = w.isLegendInset ? 10 : g, F[a] = E, E += n
            }

            var g, h, i = 0 === e, j = e === a.length - 1, k = d(b, c), l = k.width + D + (!j || w.isLegendRight || w.isLegendInset ? z : 0), m = k.height + y, n = w.isLegendRight || w.isLegendInset ? m : l, o = w.isLegendRight || w.isLegendInset ? w.getLegendHeight() : w.getLegendWidth();
            return i && (E = 0, K = 0, A = 0, B = 0), x.legend_show && !w.isLegendToShow(c) ? void(G[c] = H[c] = J[c] = F[c] = 0) : (G[c] = l, H[c] = m, (!A || l >= A) && (A = l), (!B || m >= B) && (B = m), h = w.isLegendRight || w.isLegendInset ? B : A, void(x.legend_equally ? (Object.keys(G).forEach(function (a) {
                G[a] = A
            }), Object.keys(H).forEach(function (a) {
                H[a] = B
            }), g = (o - h * a.length) / 2, C > g ? (E = 0, K = 0, a.forEach(function (a) {
                f(a)
            })) : f(c, !0)) : f(c)))
        }

        var f, g, j, k, l, m, o, p, q, r, s, u, v, w = this, x = w.config, y = 4, z = 10, A = 0, B = 0, C = 10, D = 15, E = 0, F = {}, G = {}, H = {}, I = [0], J = {}, K = 0, L = w.legend.selectAll("." + i.legendItemFocused).size();
        b = b || {}, p = t(b, "withTransition", !0), q = t(b, "withTransitionForTransform", !0), w.isLegendInset && (K = x.legend_inset_step ? x.legend_inset_step : a.length, w.updateLegendStep(K)), w.isLegendRight ? (f = function (a) {
            return A * J[a]
        }, k = function (a) {
            return I[J[a]] + F[a]
        }) : w.isLegendInset ? (f = function (a) {
            return A * J[a] + 10
        }, k = function (a) {
            return I[J[a]] + F[a]
        }) : (f = function (a) {
            return I[J[a]] + F[a]
        }, k = function (a) {
            return B * J[a]
        }), g = function (a, b) {
            return f(a, b) + 14
        }, l = function (a, b) {
            return k(a, b) + 9
        }, j = function (a, b) {
            return f(a, b)
        }, m = function (a, b) {
            return k(a, b) - 5
        }, o = w.legend.selectAll("." + i.legendItem).data(a).enter().append("g").attr("class", function (a) {
            return w.generateClass(i.legendItem, a)
        }).style("visibility", function (a) {
            return w.isLegendToShow(a) ? "visible" : "hidden"
        }).style("cursor", "pointer").on("click", function (a) {
            x.legend_item_onclick ? x.legend_item_onclick.call(w, a) : w.d3.event.altKey ? (w.api.hide(), w.api.show(a)) : (w.api.toggle(a), w.isTargetToShow(a) ? w.api.focus(a) : w.api.revert())
        }).on("mouseover", function (a) {
            w.d3.select(this).classed(i.legendItemFocused, !0), !w.transiting && w.isTargetToShow(a) && w.api.focus(a), x.legend_item_onmouseover && x.legend_item_onmouseover.call(w, a)
        }).on("mouseout", function (a) {
            w.d3.select(this).classed(i.legendItemFocused, !1), w.api.revert(), x.legend_item_onmouseout && x.legend_item_onmouseout.call(w, a)
        }), o.append("text").text(function (a) {
            return n(x.data_names[a]) ? x.data_names[a] : a
        }).each(function (a, b) {
            e(this, a, b)
        }).style("pointer-events", "none").attr("x", w.isLegendRight || w.isLegendInset ? g : -200).attr("y", w.isLegendRight || w.isLegendInset ? -200 : l), o.append("rect").attr("class", i.legendItemEvent).style("fill-opacity", 0).attr("x", w.isLegendRight || w.isLegendInset ? j : -200).attr("y", w.isLegendRight || w.isLegendInset ? -200 : m), o.append("rect").attr("class", i.legendItemTile).style("pointer-events", "none").style("fill", w.color).attr("x", w.isLegendRight || w.isLegendInset ? g : -200).attr("y", w.isLegendRight || w.isLegendInset ? -200 : k).attr("width", 10).attr("height", 10), v = w.legend.select("." + i.legendBackground + " rect"), w.isLegendInset && A > 0 && 0 === v.size() && (v = w.legend.insert("g", "." + i.legendItem).attr("class", i.legendBackground).append("rect")), r = w.legend.selectAll("text").data(a).text(function (a) {
            return n(x.data_names[a]) ? x.data_names[a] : a
        }).each(function (a, b) {
            e(this, a, b)
        }), (p ? r.transition() : r).attr("x", g).attr("y", l), s = w.legend.selectAll("rect." + i.legendItemEvent).data(a), (p ? s.transition() : s).attr("width", function (a) {
            return G[a]
        }).attr("height", function (a) {
            return H[a]
        }).attr("x", j).attr("y", m), u = w.legend.selectAll("rect." + i.legendItemTile).data(a), (p ? u.transition() : u).style("fill", w.color).attr("x", f).attr("y", k), v && (p ? v.transition() : v).attr("height", w.getLegendHeight() - 12).attr("width", A * (K + 1) + 10), w.legend.selectAll("." + i.legendItem).classed(i.legendItemHidden, function (a) {
            return !w.isTargetToShow(a)
        }).transition().style("opacity", function (a) {
            var b = w.d3.select(this);
            return w.isTargetToShow(a) ? !L || b.classed(i.legendItemFocused) ? w.opacityForLegend(b) : w.opacityForUnfocusedLegend(b) : null
        }), w.updateLegendItemWidth(A), w.updateLegendItemHeight(B), w.updateLegendStep(K), w.updateSizes(), w.updateScales(), w.updateSvgSize(), w.transformAll(q, c), w.legendHasRendered = !0
    }, f.initAxis = function () {
        var a = this, b = a.config, c = a.main;
        a.axes.x = c.append("g").attr("class", i.axis + " " + i.axisX).attr("clip-path", a.clipPathForXAxis).attr("transform", a.getTranslate("x")).style("visibility", b.axis_x_show ? "visible" : "hidden"), a.axes.x.append("text").attr("class", i.axisXLabel).attr("transform", b.axis_rotated ? "rotate(-90)" : "").style("text-anchor", a.textAnchorForXAxisLabel.bind(a)), a.axes.y = c.append("g").attr("class", i.axis + " " + i.axisY).attr("clip-path", b.axis_y_inner ? "" : a.clipPathForYAxis).attr("transform", a.getTranslate("y")).style("visibility", b.axis_y_show ? "visible" : "hidden"), a.axes.y.append("text").attr("class", i.axisYLabel).attr("transform", b.axis_rotated ? "" : "rotate(-90)").style("text-anchor", a.textAnchorForYAxisLabel.bind(a)), a.axes.y2 = c.append("g").attr("class", i.axis + " " + i.axisY2).attr("transform", a.getTranslate("y2")).style("visibility", b.axis_y2_show ? "visible" : "hidden"), a.axes.y2.append("text").attr("class", i.axisY2Label).attr("transform", b.axis_rotated ? "" : "rotate(-90)").style("text-anchor", a.textAnchorForY2AxisLabel.bind(a))
    }, f.getXAxis = function (a, b, c, e, f) {
        var g = this, h = g.config, i = {
            isCategory: g.isCategorized(),
            withOuterTick: f,
            tickMultiline: h.axis_x_tick_multiline,
            tickWidth: h.axis_x_tick_width
        }, j = d(g.d3, i).scale(a).orient(b);
        return g.isTimeSeries() && e && (e = e.map(function (a) {
            return g.parseDate(a)
        })), j.tickFormat(c).tickValues(e), g.isCategorized() ? (j.tickCentered(h.axis_x_tick_centered), r(h.axis_x_tick_culling) && (h.axis_x_tick_culling = !1)) : j.tickOffset = function () {
            var a = this.scale(), b = g.getEdgeX(g.data.targets), c = a(b[1]) - a(b[0]), d = c ? c : h.axis_rotated ? g.height : g.width;
            return d / g.getMaxDataCount() / 2
        }, j
    }, f.getYAxis = function (a, b, c, e, f) {
        var g = {withOuterTick: f}, h = d(this.d3, g).scale(a).orient(b).tickFormat(c);
        return this.isTimeSeriesY() ? h.ticks(this.d3.time[this.config.axis_y_tick_time_value], this.config.axis_y_tick_time_interval) : h.tickValues(e), h
    }, f.getAxisId = function (a) {
        var b = this.config;
        return a in b.data_axes ? b.data_axes[a] : "y"
    }, f.getXAxisTickFormat = function () {
        var a = this, b = a.config, c = a.isTimeSeries() ? a.defaultAxisTimeFormat : a.isCategorized() ? a.categoryName : function (a) {
            return 0 > a ? a.toFixed(0) : a
        };
        return b.axis_x_tick_format && (k(b.axis_x_tick_format) ? c = b.axis_x_tick_format : a.isTimeSeries() && (c = function (c) {
            return c ? a.axisTimeFormat(b.axis_x_tick_format)(c) : ""
        })), k(c) ? function (b) {
            return c.call(a, b)
        } : c
    }, f.getAxisTickValues = function (a, b) {
        return a ? a : b ? b.tickValues() : void 0
    }, f.getXAxisTickValues = function () {
        return this.getAxisTickValues(this.config.axis_x_tick_values, this.xAxis)
    }, f.getYAxisTickValues = function () {
        return this.getAxisTickValues(this.config.axis_y_tick_values, this.yAxis)
    }, f.getY2AxisTickValues = function () {
        return this.getAxisTickValues(this.config.axis_y2_tick_values, this.y2Axis)
    }, f.getAxisLabelOptionByAxisId = function (a) {
        var b, c = this, d = c.config;
        return "y" === a ? b = d.axis_y_label : "y2" === a ? b = d.axis_y2_label : "x" === a && (b = d.axis_x_label), b
    }, f.getAxisLabelText = function (a) {
        var b = this.getAxisLabelOptionByAxisId(a);
        return l(b) ? b : b ? b.text : null
    }, f.setAxisLabelText = function (a, b) {
        var c = this, d = c.config, e = c.getAxisLabelOptionByAxisId(a);
        l(e) ? "y" === a ? d.axis_y_label = b : "y2" === a ? d.axis_y2_label = b : "x" === a && (d.axis_x_label = b) : e && (e.text = b)
    }, f.getAxisLabelPosition = function (a, b) {
        var c = this.getAxisLabelOptionByAxisId(a), d = c && "object" == typeof c && c.position ? c.position : b;
        return {
            isInner: d.indexOf("inner") >= 0,
            isOuter: d.indexOf("outer") >= 0,
            isLeft: d.indexOf("left") >= 0,
            isCenter: d.indexOf("center") >= 0,
            isRight: d.indexOf("right") >= 0,
            isTop: d.indexOf("top") >= 0,
            isMiddle: d.indexOf("middle") >= 0,
            isBottom: d.indexOf("bottom") >= 0
        }
    }, f.getXAxisLabelPosition = function () {
        return this.getAxisLabelPosition("x", this.config.axis_rotated ? "inner-top" : "inner-right")
    }, f.getYAxisLabelPosition = function () {
        return this.getAxisLabelPosition("y", this.config.axis_rotated ? "inner-right" : "inner-top")
    }, f.getY2AxisLabelPosition = function () {
        return this.getAxisLabelPosition("y2", this.config.axis_rotated ? "inner-right" : "inner-top")
    }, f.getAxisLabelPositionById = function (a) {
        return "y2" === a ? this.getY2AxisLabelPosition() : "y" === a ? this.getYAxisLabelPosition() : this.getXAxisLabelPosition()
    }, f.textForXAxisLabel = function () {
        return this.getAxisLabelText("x")
    }, f.textForYAxisLabel = function () {
        return this.getAxisLabelText("y")
    }, f.textForY2AxisLabel = function () {
        return this.getAxisLabelText("y2")
    }, f.xForAxisLabel = function (a, b) {
        var c = this;
        return a ? b.isLeft ? 0 : b.isCenter ? c.width / 2 : c.width : b.isBottom ? -c.height : b.isMiddle ? -c.height / 2 : 0
    }, f.dxForAxisLabel = function (a, b) {
        return a ? b.isLeft ? "0.5em" : b.isRight ? "-0.5em" : "0" : b.isTop ? "-0.5em" : b.isBottom ? "0.5em" : "0"
    }, f.textAnchorForAxisLabel = function (a, b) {
        return a ? b.isLeft ? "start" : b.isCenter ? "middle" : "end" : b.isBottom ? "start" : b.isMiddle ? "middle" : "end"
    }, f.xForXAxisLabel = function () {
        return this.xForAxisLabel(!this.config.axis_rotated, this.getXAxisLabelPosition())
    }, f.xForYAxisLabel = function () {
        return this.xForAxisLabel(this.config.axis_rotated, this.getYAxisLabelPosition())
    }, f.xForY2AxisLabel = function () {
        return this.xForAxisLabel(this.config.axis_rotated, this.getY2AxisLabelPosition())
    }, f.dxForXAxisLabel = function () {
        return this.dxForAxisLabel(!this.config.axis_rotated, this.getXAxisLabelPosition())
    }, f.dxForYAxisLabel = function () {
        return this.dxForAxisLabel(this.config.axis_rotated, this.getYAxisLabelPosition())
    }, f.dxForY2AxisLabel = function () {
        return this.dxForAxisLabel(this.config.axis_rotated, this.getY2AxisLabelPosition())
    }, f.dyForXAxisLabel = function () {
        var a = this, b = a.config, c = a.getXAxisLabelPosition();
        return b.axis_rotated ? c.isInner ? "1.2em" : -25 - a.getMaxTickWidth("x") : c.isInner ? "-0.5em" : b.axis_x_height ? b.axis_x_height - 10 : "3em"
    }, f.dyForYAxisLabel = function () {
        var a = this, b = a.getYAxisLabelPosition();
        return a.config.axis_rotated ? b.isInner ? "-0.5em" : "3em" : b.isInner ? "1.2em" : -10 - (a.config.axis_y_inner ? 0 : a.getMaxTickWidth("y") + 10)
    }, f.dyForY2AxisLabel = function () {
        var a = this, b = a.getY2AxisLabelPosition();
        return a.config.axis_rotated ? b.isInner ? "1.2em" : "-2.2em" : b.isInner ? "-0.5em" : 15 + (a.config.axis_y2_inner ? 0 : this.getMaxTickWidth("y2") + 15)
    }, f.textAnchorForXAxisLabel = function () {
        var a = this;
        return a.textAnchorForAxisLabel(!a.config.axis_rotated, a.getXAxisLabelPosition())
    }, f.textAnchorForYAxisLabel = function () {
        var a = this;
        return a.textAnchorForAxisLabel(a.config.axis_rotated, a.getYAxisLabelPosition())
    }, f.textAnchorForY2AxisLabel = function () {
        var a = this;
        return a.textAnchorForAxisLabel(a.config.axis_rotated, a.getY2AxisLabelPosition())
    }, f.xForRotatedTickText = function (a) {
        return 8 * Math.sin(Math.PI * (a / 180))
    }, f.yForRotatedTickText = function (a) {
        return 11.5 - 2.5 * (a / 15) * (a > 0 ? 1 : -1)
    }, f.rotateTickText = function (a, b, c) {
        a.selectAll(".tick text").style("text-anchor", c > 0 ? "start" : "end"), b.selectAll(".tick text").attr("y", this.yForRotatedTickText(c)).attr("transform", "rotate(" + c + ")").selectAll("tspan").attr("dx", this.xForRotatedTickText(c))
    }, f.getMaxTickWidth = function (a, b) {
        var c, d, e, f = this, g = f.config, h = 0;
        return b && f.currentMaxTickWidths[a] ? f.currentMaxTickWidths[a] : (f.svg && (c = f.filterTargetsToShow(f.data.targets), "y" === a ? (d = f.y.copy().domain(f.getYDomain(c, "y")), e = f.getYAxis(d, f.yOrient, g.axis_y_tick_format, f.yAxisTickValues)) : "y2" === a ? (d = f.y2.copy().domain(f.getYDomain(c, "y2")), e = f.getYAxis(d, f.y2Orient, g.axis_y2_tick_format, f.y2AxisTickValues)) : (d = f.x.copy().domain(f.getXDomain(c)), e = f.getXAxis(d, f.xOrient, f.xAxisTickFormat, f.xAxisTickValues)), f.d3.select("body").append("g").style("visibility", "hidden").call(e).each(function () {
            f.d3.select(this).selectAll("text tspan").each(function () {
                var a = this.getBoundingClientRect();
                a.left > 0 && h < a.width && (h = a.width)
            })
        }).remove()), f.currentMaxTickWidths[a] = 0 >= h ? f.currentMaxTickWidths[a] : h, f.currentMaxTickWidths[a])
    }, f.updateAxisLabels = function (a) {
        var b = this, c = b.main.select("." + i.axisX + " ." + i.axisXLabel), d = b.main.select("." + i.axisY + " ." + i.axisYLabel), e = b.main.select("." + i.axisY2 + " ." + i.axisY2Label);
        (a ? c.transition() : c).attr("x", b.xForXAxisLabel.bind(b)).attr("dx", b.dxForXAxisLabel.bind(b)).attr("dy", b.dyForXAxisLabel.bind(b)).text(b.textForXAxisLabel.bind(b)), (a ? d.transition() : d).attr("x", b.xForYAxisLabel.bind(b)).attr("dx", b.dxForYAxisLabel.bind(b)).attr("dy", b.dyForYAxisLabel.bind(b)).text(b.textForYAxisLabel.bind(b)), (a ? e.transition() : e).attr("x", b.xForY2AxisLabel.bind(b)).attr("dx", b.dxForY2AxisLabel.bind(b)).attr("dy", b.dyForY2AxisLabel.bind(b)).text(b.textForY2AxisLabel.bind(b))
    }, f.getAxisPadding = function (a, b, c, d) {
        return j(a[b]) ? "ratio" === a.unit ? a[b] * d : this.convertPixelsToAxisPadding(a[b], d) : c
    }, f.convertPixelsToAxisPadding = function (a, b) {
        var c = this.config.axis_rotated ? this.width : this.height;
        return b * (a / c)
    }, f.generateTickValues = function (a, b, c) {
        var d, e, f, g, h, i, j, l = a;
        if (b)if (d = k(b) ? b() : b, 1 === d)l = [a[0]]; else if (2 === d)l = [a[0], a[a.length - 1]]; else if (d > 2) {
            for (g = d - 2, e = a[0], f = a[a.length - 1], h = (f - e) / (g + 1), l = [e], i = 0; g > i; i++)j = +e + h * (i + 1), l.push(c ? new Date(j) : j);
            l.push(f)
        }
        return c || (l = l.sort(function (a, b) {
            return a - b
        })), l
    }, f.generateAxisTransitions = function (a) {
        var b = this, c = b.axes;
        return {
            axisX: a ? c.x.transition().duration(a) : c.x,
            axisY: a ? c.y.transition().duration(a) : c.y,
            axisY2: a ? c.y2.transition().duration(a) : c.y2,
            axisSubX: a ? c.subx.transition().duration(a) : c.subx
        }
    }, f.redrawAxis = function (a, b) {
        var c = this, d = c.config;
        c.axes.x.style("opacity", b ? 0 : 1), c.axes.y.style("opacity", b ? 0 : 1), c.axes.y2.style("opacity", b ? 0 : 1), c.axes.subx.style("opacity", b ? 0 : 1), a.axisX.call(c.xAxis), a.axisY.call(c.yAxis), a.axisY2.call(c.y2Axis), a.axisSubX.call(c.subXAxis), !d.axis_rotated && d.axis_x_tick_rotate && (c.rotateTickText(c.axes.x, a.axisX, d.axis_x_tick_rotate), c.rotateTickText(c.axes.subx, a.axisSubX, d.axis_x_tick_rotate))
    }, f.getClipPath = function (b) {
        var c = a.navigator.appVersion.toLowerCase().indexOf("msie 9.") >= 0;
        return "url(" + (c ? "" : document.URL.split("#")[0]) + "#" + b + ")"
    }, f.appendClip = function (a, b) {
        return a.append("clipPath").attr("id", b).append("rect")
    }, f.getAxisClipX = function (a) {
        var b = Math.max(30, this.margin.left);
        return a ? -(1 + b) : -(b - 1)
    }, f.getAxisClipY = function (a) {
        return a ? -20 : -this.margin.top
    }, f.getXAxisClipX = function () {
        var a = this;
        return a.getAxisClipX(!a.config.axis_rotated)
    }, f.getXAxisClipY = function () {
        var a = this;
        return a.getAxisClipY(!a.config.axis_rotated)
    }, f.getYAxisClipX = function () {
        var a = this;
        return a.config.axis_y_inner ? -1 : a.getAxisClipX(a.config.axis_rotated)
    }, f.getYAxisClipY = function () {
        var a = this;
        return a.getAxisClipY(a.config.axis_rotated)
    }, f.getAxisClipWidth = function (a) {
        var b = this, c = Math.max(30, b.margin.left), d = Math.max(30, b.margin.right);
        return a ? b.width + 2 + c + d : b.margin.left + 20
    }, f.getAxisClipHeight = function (a) {
        return (a ? this.margin.bottom : this.margin.top + this.height) + 20
    }, f.getXAxisClipWidth = function () {
        var a = this;
        return a.getAxisClipWidth(!a.config.axis_rotated)
    }, f.getXAxisClipHeight = function () {
        var a = this;
        return a.getAxisClipHeight(!a.config.axis_rotated)
    }, f.getYAxisClipWidth = function () {
        var a = this;
        return a.getAxisClipWidth(a.config.axis_rotated) + (a.config.axis_y_inner ? 20 : 0)
    }, f.getYAxisClipHeight = function () {
        var a = this;
        return a.getAxisClipHeight(a.config.axis_rotated)
    }, f.initPie = function () {
        var a = this, b = a.d3, c = a.config;
        a.pie = b.layout.pie().value(function (a) {
            return a.values.reduce(function (a, b) {
                return a + b.value
            }, 0)
        }), c.data_order || a.pie.sort(null)
    }, f.updateRadius = function () {
        var a = this, b = a.config, c = b.gauge_width || b.donut_width;
        a.radiusExpanded = Math.min(a.arcWidth, a.arcHeight) / 2, a.radius = .95 * a.radiusExpanded, a.innerRadiusRatio = c ? (a.radius - c) / a.radius : .6, a.innerRadius = a.hasType("donut") || a.hasType("gauge") ? a.radius * a.innerRadiusRatio : 0
    }, f.updateArc = function () {
        var a = this;
        a.svgArc = a.getSvgArc(), a.svgArcExpanded = a.getSvgArcExpanded(), a.svgArcExpandedSub = a.getSvgArcExpanded(.98)
    }, f.updateAngle = function (a) {
        var b, c, d = this, e = d.config, f = !1, g = 0, h = e.gauge_min, i = e.gauge_max;
        return d.pie(d.filterTargetsToShow(d.data.targets)).forEach(function (b) {
            f || b.data.id !== a.data.id || (f = !0, a = b, a.index = g), g++
        }), isNaN(a.endAngle) && (a.endAngle = a.startAngle), d.isGaugeType(a.data) && (b = Math.PI / (i - h), c = a.value < h ? 0 : a.value < i ? a.value - h : i - h, a.startAngle = -1 * (Math.PI / 2), a.endAngle = a.startAngle + b * c), f ? a : null
    }, f.getSvgArc = function () {
        var a = this, b = a.d3.svg.arc().outerRadius(a.radius).innerRadius(a.innerRadius), c = function (c, d) {
            var e;
            return d ? b(c) : (e = a.updateAngle(c), e ? b(e) : "M 0 0")
        };
        return c.centroid = b.centroid, c
    }, f.getSvgArcExpanded = function (a) {
        var b = this, c = b.d3.svg.arc().outerRadius(b.radiusExpanded * (a ? a : 1)).innerRadius(b.innerRadius);
        return function (a) {
            var d = b.updateAngle(a);
            return d ? c(d) : "M 0 0"
        }
    }, f.getArc = function (a, b, c) {
        return c || this.isArcType(a.data) ? this.svgArc(a, b) : "M 0 0"
    }, f.transformForArcLabel = function (a) {
        var b, c, d, e, f, g = this, h = g.updateAngle(a), i = "";
        return h && !g.hasType("gauge") && (b = this.svgArc.centroid(h), c = isNaN(b[0]) ? 0 : b[0], d = isNaN(b[1]) ? 0 : b[1], e = Math.sqrt(c * c + d * d), f = g.radius && e ? (36 / g.radius > .375 ? 1.175 - 36 / g.radius : .8) * g.radius / e : 0, i = "translate(" + c * f + "," + d * f + ")"), i
    }, f.getArcRatio = function (a) {
        var b = this, c = b.hasType("gauge") ? Math.PI : 2 * Math.PI;
        return a ? (a.endAngle - a.startAngle) / c : null
    }, f.convertToArcData = function (a) {
        return this.addName({id: a.data.id, value: a.value, ratio: this.getArcRatio(a), index: a.index})
    }, f.textForArcLabel = function (a) {
        var b, c, d, e, f, g = this;
        return g.shouldShowArcLabel() ? (b = g.updateAngle(a), c = b ? b.value : null, d = g.getArcRatio(b), e = a.data.id, g.hasType("gauge") || g.meetsArcLabelThreshold(d) ? (f = g.getArcLabelFormat(), f ? f(c, d, e) : g.defaultArcValueFormat(c, d)) : "") : ""
    }, f.expandArc = function (b) {
        var c, d = this;
        return d.transiting ? void(c = a.setInterval(function () {
            d.transiting || (a.clearInterval(c), d.legend.selectAll(".c3-legend-item-focused").size() > 0 && d.expandArc(b))
        }, 10)) : (b = d.mapToTargetIds(b), void d.svg.selectAll(d.selectorTargets(b, "." + i.chartArc)).each(function (a) {
            d.shouldExpand(a.data.id) && d.d3.select(this).selectAll("path").transition().duration(50).attr("d", d.svgArcExpanded).transition().duration(100).attr("d", d.svgArcExpandedSub).each(function (a) {
                d.isDonutType(a.data)
            })
        }))
    }, f.unexpandArc = function (a) {
        var b = this;
        b.transiting || (a = b.mapToTargetIds(a), b.svg.selectAll(b.selectorTargets(a, "." + i.chartArc)).selectAll("path").transition().duration(50).attr("d", b.svgArc), b.svg.selectAll("." + i.arc).style("opacity", 1))
    }, f.shouldExpand = function (a) {
        var b = this, c = b.config;
        return b.isDonutType(a) && c.donut_expand || b.isGaugeType(a) && c.gauge_expand || b.isPieType(a) && c.pie_expand
    }, f.shouldShowArcLabel = function () {
        var a = this, b = a.config, c = !0;
        return a.hasType("donut") ? c = b.donut_label_show : a.hasType("pie") && (c = b.pie_label_show), c
    }, f.meetsArcLabelThreshold = function (a) {
        var b = this, c = b.config, d = b.hasType("donut") ? c.donut_label_threshold : c.pie_label_threshold;
        return a >= d
    }, f.getArcLabelFormat = function () {
        var a = this, b = a.config, c = b.pie_label_format;
        return a.hasType("gauge") ? c = b.gauge_label_format : a.hasType("donut") && (c = b.donut_label_format), c
    }, f.getArcTitle = function () {
        var a = this;
        return a.hasType("donut") ? a.config.donut_title : ""
    }, f.updateTargetsForArc = function (a) {
        var b, c, d = this, e = d.main, f = d.classChartArc.bind(d), g = d.classArcs.bind(d), h = d.classFocus.bind(d);
        b = e.select("." + i.chartArcs).selectAll("." + i.chartArc).data(d.pie(a)).attr("class", function (a) {
            return f(a) + h(a.data)
        }), c = b.enter().append("g").attr("class", f), c.append("g").attr("class", g), c.append("text").attr("dy", d.hasType("gauge") ? "-.1em" : ".35em").style("opacity", 0).style("text-anchor", "middle").style("pointer-events", "none")
    }, f.initArc = function () {
        var a = this;
        a.arcs = a.main.select("." + i.chart).append("g").attr("class", i.chartArcs).attr("transform", a.getTranslate("arc")), a.arcs.append("text").attr("class", i.chartArcsTitle).style("text-anchor", "middle").text(a.getArcTitle())
    }, f.redrawArc = function (a, b, c) {
        var d, e = this, f = e.d3, g = e.config, h = e.main;
        d = h.selectAll("." + i.arcs).selectAll("." + i.arc).data(e.arcData.bind(e)), d.enter().append("path").attr("class", e.classArc.bind(e)).style("fill", function (a) {
            return e.color(a.data)
        }).style("cursor", function (a) {
            return g.interaction_enabled && g.data_selection_isselectable(a) ? "pointer" : null
        }).style("opacity", 0).each(function (a) {
            e.isGaugeType(a.data) && (a.startAngle = a.endAngle = -1 * (Math.PI / 2)), this._current = a
        }), d.attr("transform", function (a) {
            return !e.isGaugeType(a.data) && c ? "scale(0)" : ""
        }).style("opacity", function (a) {
            return a === this._current ? 0 : 1
        }).on("mouseover", g.interaction_enabled ? function (a) {
            var b, c;
            e.transiting || (b = e.updateAngle(a), c = e.convertToArcData(b), e.expandArc(b.data.id), e.api.focus(b.data.id), e.toggleFocusLegend(b.data.id, !0), e.config.data_onmouseover(c, this))
        } : null).on("mousemove", g.interaction_enabled ? function (a) {
            var b = e.updateAngle(a), c = e.convertToArcData(b), d = [c];
            e.showTooltip(d, f.mouse(this))
        } : null).on("mouseout", g.interaction_enabled ? function (a) {
            var b, c;
            e.transiting || (b = e.updateAngle(a), c = e.convertToArcData(b), e.unexpandArc(b.data.id), e.api.revert(), e.revertLegend(), e.hideTooltip(), e.config.data_onmouseout(c, this))
        } : null).on("click", g.interaction_enabled ? function (a, b) {
            var c = e.updateAngle(a), d = e.convertToArcData(c);
            e.toggleShape && e.toggleShape(this, d, b), e.config.data_onclick.call(e.api, d, this)
        } : null).each(function () {
            e.transiting = !0
        }).transition().duration(a).attrTween("d", function (a) {
            var b, c = e.updateAngle(a);
            return c ? (isNaN(this._current.endAngle) && (this._current.endAngle = this._current.startAngle), b = f.interpolate(this._current, c), this._current = b(0), function (c) {
                var d = b(c);
                return d.data = a.data, e.getArc(d, !0)
            }) : function () {
                return "M 0 0"
            }
        }).attr("transform", c ? "scale(1)" : "").style("fill", function (a) {
            return e.levelColor ? e.levelColor(a.data.values[0].value) : e.color(a.data.id)
        }).style("opacity", 1).call(e.endall, function () {
            e.transiting = !1
        }), d.exit().transition().duration(b).style("opacity", 0).remove(), h.selectAll("." + i.chartArc).select("text").style("opacity", 0).attr("class", function (a) {
            return e.isGaugeType(a.data) ? i.gaugeValue : ""
        }).text(e.textForArcLabel.bind(e)).attr("transform", e.transformForArcLabel.bind(e)).style("font-size", function (a) {
            return e.isGaugeType(a.data) ? Math.round(e.radius / 5) + "px" : ""
        }).transition().duration(a).style("opacity", function (a) {
            return e.isTargetToShow(a.data.id) && e.isArcType(a.data) ? 1 : 0
        }), h.select("." + i.chartArcsTitle).style("opacity", e.hasType("donut") || e.hasType("gauge") ? 1 : 0), e.hasType("gauge") && (e.arcs.select("." + i.chartArcsBackground).attr("d", function () {
            var a = {data: [{value: g.gauge_max}], startAngle: -1 * (Math.PI / 2), endAngle: Math.PI / 2};
            return e.getArc(a, !0, !0)
        }), e.arcs.select("." + i.chartArcsGaugeUnit).attr("dy", ".75em").text(g.gauge_label_show ? g.gauge_units : ""), e.arcs.select("." + i.chartArcsGaugeMin).attr("dx", -1 * (e.innerRadius + (e.radius - e.innerRadius) / 2) + "px").attr("dy", "1.2em").text(g.gauge_label_show ? g.gauge_min : ""), e.arcs.select("." + i.chartArcsGaugeMax).attr("dx", e.innerRadius + (e.radius - e.innerRadius) / 2 + "px").attr("dy", "1.2em").text(g.gauge_label_show ? g.gauge_max : ""))
    }, f.initGauge = function () {
        var a = this.arcs;
        this.hasType("gauge") && (a.append("path").attr("class", i.chartArcsBackground), a.append("text").attr("class", i.chartArcsGaugeUnit).style("text-anchor", "middle").style("pointer-events", "none"), a.append("text").attr("class", i.chartArcsGaugeMin).style("text-anchor", "middle").style("pointer-events", "none"), a.append("text").attr("class", i.chartArcsGaugeMax).style("text-anchor", "middle").style("pointer-events", "none"))
    }, f.getGaugeLabelHeight = function () {
        return this.config.gauge_label_show ? 20 : 0
    }, f.initRegion = function () {
        var a = this;
        a.region = a.main.append("g").attr("clip-path", a.clipPath).attr("class", i.regions)
    }, f.redrawRegion = function (a) {
        var b = this, c = b.config;
        b.region.style("visibility", b.hasArcType() ? "hidden" : "visible"), b.mainRegion = b.main.select("." + i.regions).selectAll("." + i.region).data(c.regions), b.mainRegion.enter().append("g").attr("class", b.classRegion.bind(b)).append("rect").style("fill-opacity", 0), b.mainRegion.exit().transition().duration(a).style("opacity", 0).remove()
    }, f.addTransitionForRegion = function (a) {
        var b = this, c = b.regionX.bind(b), d = b.regionY.bind(b), e = b.regionWidth.bind(b), f = b.regionHeight.bind(b);
        a.push(b.mainRegion.selectAll("rect").transition().attr("x", c).attr("y", d).attr("width", e).attr("height", f).style("fill-opacity", function (a) {
            return j(a.opacity) ? a.opacity : .1
        }))
    }, f.regionX = function (a) {
        var b, c = this, d = c.config, e = "y" === a.axis ? c.y : c.y2;
        return b = "y" === a.axis || "y2" === a.axis ? d.axis_rotated && "start"in a ? e(a.start) : 0 : d.axis_rotated ? 0 : "start"in a ? c.x(c.isTimeSeries() ? c.parseDate(a.start) : a.start) : 0
    }, f.regionY = function (a) {
        var b, c = this, d = c.config, e = "y" === a.axis ? c.y : c.y2;
        return b = "y" === a.axis || "y2" === a.axis ? d.axis_rotated ? 0 : "end"in a ? e(a.end) : 0 : d.axis_rotated && "start"in a ? c.x(c.isTimeSeries() ? c.parseDate(a.start) : a.start) : 0
    }, f.regionWidth = function (a) {
        var b, c = this, d = c.config, e = c.regionX(a), f = "y" === a.axis ? c.y : c.y2;
        return b = "y" === a.axis || "y2" === a.axis ? d.axis_rotated && "end"in a ? f(a.end) : c.width : d.axis_rotated ? c.width : "end"in a ? c.x(c.isTimeSeries() ? c.parseDate(a.end) : a.end) : c.width, e > b ? 0 : b - e
    }, f.regionHeight = function (a) {
        var b, c = this, d = c.config, e = this.regionY(a), f = "y" === a.axis ? c.y : c.y2;
        return b = "y" === a.axis || "y2" === a.axis ? d.axis_rotated ? c.height : "start"in a ? f(a.start) : c.height : d.axis_rotated && "end"in a ? c.x(c.isTimeSeries() ? c.parseDate(a.end) : a.end) : c.height, e > b ? 0 : b - e
    }, f.isRegionOnX = function (a) {
        return !a.axis || "x" === a.axis
    }, f.drag = function (a) {
        var b, c, d, e, f, g, h, j, k = this, l = k.config, m = k.main, n = k.d3;
        k.hasArcType() || l.data_selection_enabled && (!l.zoom_enabled || k.zoom.altDomain) && l.data_selection_multiple && (b = k.dragStart[0], c = k.dragStart[1], d = a[0], e = a[1], f = Math.min(b, d), g = Math.max(b, d), h = l.data_selection_grouped ? k.margin.top : Math.min(c, e), j = l.data_selection_grouped ? k.height : Math.max(c, e), m.select("." + i.dragarea).attr("x", f).attr("y", h).attr("width", g - f).attr("height", j - h), m.selectAll("." + i.shapes).selectAll("." + i.shape).filter(function (a) {
            return l.data_selection_isselectable(a)
        }).each(function (a, b) {
            var c, d, e, l, m, o, p = n.select(this), q = p.classed(i.SELECTED), r = p.classed(i.INCLUDED), s = !1;
            if (p.classed(i.circle))c = 1 * p.attr("cx"), d = 1 * p.attr("cy"), m = k.togglePoint, s = c > f && g > c && d > h && j > d; else {
                if (!p.classed(i.bar))return;
                o = v(this), c = o.x, d = o.y, e = o.width, l = o.height, m = k.togglePath, s = !(c > g || f > c + e || d > j || h > d + l)
            }
            s ^ r && (p.classed(i.INCLUDED, !r), p.classed(i.SELECTED, !q), m.call(k, !q, p, a, b))
        }))
    }, f.dragstart = function (a) {
        var b = this, c = b.config;
        b.hasArcType() || c.data_selection_enabled && (b.dragStart = a, b.main.select("." + i.chart).append("rect").attr("class", i.dragarea).style("opacity", .1), b.dragging = !0, b.config.data_ondragstart.call(b.api))
    }, f.dragend = function () {
        var a = this, b = a.config;
        a.hasArcType() || b.data_selection_enabled && (a.main.select("." + i.dragarea).transition().duration(100).style("opacity", 0).remove(), a.main.selectAll("." + i.shape).classed(i.INCLUDED, !1), a.dragging = !1, a.config.data_ondragend.call(a.api))
    }, f.selectPoint = function (a, b, c) {
        var d = this, e = d.config, f = (e.axis_rotated ? d.circleY : d.circleX).bind(d), g = (e.axis_rotated ? d.circleX : d.circleY).bind(d), h = d.pointSelectR.bind(d);
        e.data_onselected.call(d.api, b, a.node()), d.main.select("." + i.selectedCircles + d.getTargetSelectorSuffix(b.id)).selectAll("." + i.selectedCircle + "-" + c).data([b]).enter().append("circle").attr("class", function () {
            return d.generateClass(i.selectedCircle, c)
        }).attr("cx", f).attr("cy", g).attr("stroke", function () {
            return d.color(b)
        }).attr("r", function (a) {
            return 1.4 * d.pointSelectR(a)
        }).transition().duration(100).attr("r", h)
    }, f.unselectPoint = function (a, b, c) {
        var d = this;
        d.config.data_onunselected(b, a.node()), d.main.select("." + i.selectedCircles + d.getTargetSelectorSuffix(b.id)).selectAll("." + i.selectedCircle + "-" + c).transition().duration(100).attr("r", 0).remove()
    }, f.togglePoint = function (a, b, c, d) {
        a ? this.selectPoint(b, c, d) : this.unselectPoint(b, c, d)
    }, f.selectPath = function (a, b) {
        var c = this;
        c.config.data_onselected.call(c, b, a.node()), a.transition().duration(100).style("fill", function () {
            return c.d3.rgb(c.color(b)).brighter(.75)
        })
    }, f.unselectPath = function (a, b) {
        var c = this;
        c.config.data_onunselected.call(c, b, a.node()), a.transition().duration(100).style("fill", function () {
            return c.color(b)
        })
    }, f.togglePath = function (a, b, c, d) {
        a ? this.selectPath(b, c, d) : this.unselectPath(b, c, d)
    },f.getToggle = function (a, b) {
        var c, d = this;
        return "circle" === a.nodeName ? c = d.isStepType(b) ? function () {
        } : d.togglePoint : "path" === a.nodeName && (c = d.togglePath), c
    },f.toggleShape = function (a, b, c) {
        var d = this, e = d.d3, f = d.config, g = e.select(a), h = g.classed(i.SELECTED), j = d.getToggle(a, b).bind(d);
        f.data_selection_enabled && f.data_selection_isselectable(b) && (f.data_selection_multiple || d.main.selectAll("." + i.shapes + (f.data_selection_grouped ? d.getTargetSelectorSuffix(b.id) : "")).selectAll("." + i.shape).each(function (a, b) {
            var c = e.select(this);
            c.classed(i.SELECTED) && j(!1, c.classed(i.SELECTED, !1), a, b)
        }), g.classed(i.SELECTED, !h), j(!h, g, b, c))
    },f.initBrush = function () {
        var a = this, b = a.d3;
        a.brush = b.svg.brush().on("brush", function () {
            a.redrawForBrush()
        }), a.brush.update = function () {
            return a.context && a.context.select("." + i.brush).call(this), this
        }, a.brush.scale = function (b) {
            return a.config.axis_rotated ? this.y(b) : this.x(b)
        }
    },f.initSubchart = function () {
        var a = this, b = a.config, c = a.context = a.svg.append("g").attr("transform", a.getTranslate("context"));
        b.subchart_show || c.style("visibility", "hidden"), c.append("g").attr("clip-path", a.clipPathForSubchart).attr("class", i.chart), c.select("." + i.chart).append("g").attr("class", i.chartBars), c.select("." + i.chart).append("g").attr("class", i.chartLines), c.append("g").attr("clip-path", a.clipPath).attr("class", i.brush).call(a.brush).selectAll("rect").attr(b.axis_rotated ? "width" : "height", b.axis_rotated ? a.width2 : a.height2), a.axes.subx = c.append("g").attr("class", i.axisX).attr("transform", a.getTranslate("subx")).attr("clip-path", b.axis_rotated ? "" : a.clipPathForXAxis)
    },f.updateTargetsForSubchart = function (a) {
        var b, c, d, e, f = this, g = f.context, h = f.config, j = f.classChartBar.bind(f), k = f.classBars.bind(f), l = f.classChartLine.bind(f), m = f.classLines.bind(f), n = f.classAreas.bind(f);
        h.subchart_show && (e = g.select("." + i.chartBars).selectAll("." + i.chartBar).data(a).attr("class", j), d = e.enter().append("g").style("opacity", 0).attr("class", j), d.append("g").attr("class", k), c = g.select("." + i.chartLines).selectAll("." + i.chartLine).data(a).attr("class", l), b = c.enter().append("g").style("opacity", 0).attr("class", l), b.append("g").attr("class", m), b.append("g").attr("class", n))
    },f.redrawSubchart = function (a, b, c, d, e, f, g) {
        var h, j, k, l, m, n, o = this, p = o.d3, q = o.context, r = o.config, s = o.barData.bind(o), t = o.lineData.bind(o), u = o.classBar.bind(o), v = o.classLine.bind(o), w = o.classArea.bind(o), x = o.initialOpacity.bind(o);
        r.subchart_show && (p.event && "zoom" === p.event.type && o.brush.extent(o.x.orgDomain()).update(), a && (o.brush.empty() || o.brush.extent(o.x.orgDomain()).update(), l = o.generateDrawArea(e, !0), m = o.generateDrawBar(f, !0), n = o.generateDrawLine(g, !0), k = q.selectAll("." + i.bars).selectAll("." + i.bar).data(s), k.enter().append("path").attr("class", u).style("stroke", "none").style("fill", o.color), k.style("opacity", x).transition().duration(c).attr("d", m).style("opacity", 1), k.exit().transition().duration(c).style("opacity", 0).remove(), h = q.selectAll("." + i.lines).selectAll("." + i.line).data(t), h.enter().append("path").attr("class", v).style("stroke", o.color), h.style("opacity", x).transition().duration(c).attr("d", n).style("opacity", 1), h.exit().transition().duration(c).style("opacity", 0).remove(), j = q.selectAll("." + i.areas).selectAll("." + i.area).data(t), j.enter().append("path").attr("class", w).style("fill", o.color).style("opacity", function () {
            return o.orgAreaOpacity = +p.select(this).style("opacity"), 0
        }), j.style("opacity", 0).transition().duration(c).attr("d", l).style("fill", o.color).style("opacity", o.orgAreaOpacity), j.exit().transition().duration(d).style("opacity", 0).remove()))
    },f.redrawForBrush = function () {
        var a = this, b = a.x;
        a.redraw({
            withTransition: !1,
            withY: a.config.zoom_rescale,
            withSubchart: !1,
            withUpdateXDomain: !0,
            withDimension: !1
        }), a.config.subchart_onbrush.call(a.api, b.orgDomain())
    },f.transformContext = function (a, b) {
        var c, d = this;
        b && b.axisSubX ? c = b.axisSubX : (c = d.context.select("." + i.axisX), a && (c = c.transition())), d.context.attr("transform", d.getTranslate("context")), c.attr("transform", d.getTranslate("subx"))
    },f.getDefaultExtent = function () {
        var a = this, b = a.config, c = k(b.axis_x_extent) ? b.axis_x_extent(a.getXDomain(a.data.targets)) : b.axis_x_extent;
        return a.isTimeSeries() && (c = [a.parseDate(c[0]), a.parseDate(c[1])]), c
    },f.initZoom = function () {
        var a, b = this, c = b.d3, d = b.config;
        b.zoom = c.behavior.zoom().on("zoomstart", function () {
            a = c.event.sourceEvent, b.zoom.altDomain = c.event.sourceEvent.altKey ? b.x.orgDomain() : null, d.zoom_onzoomstart.call(b.api, c.event.sourceEvent)
        }).on("zoom", function () {
            b.redrawForZoom.call(b)
        }).on("zoomend", function () {
            var e = c.event.sourceEvent;
            e && a.clientX === e.clientX && a.clientY === e.clientY || (b.redrawEventRect(), b.updateZoom(), d.zoom_onzoomend.call(b.api, b.x.orgDomain()))
        }), b.zoom.scale = function (a) {
            return d.axis_rotated ? this.y(a) : this.x(a)
        }, b.zoom.orgScaleExtent = function () {
            var a = d.zoom_extent ? d.zoom_extent : [1, 10];
            return [a[0], Math.max(b.getMaxDataCount() / a[1], a[1])]
        }, b.zoom.updateScaleExtent = function () {
            var a = q(b.x.orgDomain()) / q(b.orgXDomain), c = this.orgScaleExtent();
            return this.scaleExtent([c[0] * a, c[1] * a]), this
        }
    },f.updateZoom = function () {
        var a = this, b = a.config.zoom_enabled ? a.zoom : function () {
        };
        a.main.select("." + i.zoomRect).call(b).on("dblclick.zoom", null), a.main.selectAll("." + i.eventRect).call(b).on("dblclick.zoom", null)
    },f.redrawForZoom = function () {
        var a = this, b = a.d3, c = a.config, d = a.zoom, e = a.x;
        if (c.zoom_enabled && 0 !== a.filterTargetsToShow(a.data.targets).length) {
            if ("mousemove" === b.event.sourceEvent.type && d.altDomain)return e.domain(d.altDomain), void d.scale(e).updateScaleExtent();
            a.isCategorized() && e.orgDomain()[0] === a.orgXDomain[0] && e.domain([a.orgXDomain[0] - 1e-10, e.orgDomain()[1]]), a.redraw({
                withTransition: !1,
                withY: c.zoom_rescale,
                withSubchart: !1,
                withEventRect: !1,
                withDimension: !1
            }), "mousemove" === b.event.sourceEvent.type && (a.cancelClick = !0), c.zoom_onzoom.call(a.api, e.orgDomain())
        }
    },f.generateColor = function () {
        var a = this, b = a.config, c = a.d3, d = b.data_colors, e = s(b.color_pattern) ? b.color_pattern : c.scale.category10().range(), f = b.data_color, g = [];
        return function (a) {
            var b, c = a.id || a;
            return d[c]instanceof Function ? b = d[c](a) : d[c] ? b = d[c] : (g.indexOf(c) < 0 && g.push(c), b = e[g.indexOf(c) % e.length], d[c] = b), f instanceof Function ? f(b, a) : b
        }
    },f.generateLevelColor = function () {
        var a = this, b = a.config, c = b.color_pattern, d = b.color_threshold, e = "value" === d.unit, f = d.values && d.values.length ? d.values : [], g = d.max || 100;
        return s(b.color_threshold) ? function (a) {
            var b, d, h = c[c.length - 1];
            for (b = 0; b < f.length; b++)if (d = e ? a : 100 * a / g, d < f[b]) {
                h = c[b];
                break
            }
            return h
        } : null
    },f.getYFormat = function (a) {
        var b = this, c = a && !b.hasType("gauge") ? b.defaultArcValueFormat : b.yFormat, d = a && !b.hasType("gauge") ? b.defaultArcValueFormat : b.y2Format;
        return function (a, e, f) {
            var g = "y2" === b.getAxisId(f) ? d : c;
            return g.call(b, a, e)
        }
    },f.yFormat = function (a) {
        var b = this, c = b.config, d = c.axis_y_tick_format ? c.axis_y_tick_format : b.defaultValueFormat;
        return d(a)
    },f.y2Format = function (a) {
        var b = this, c = b.config, d = c.axis_y2_tick_format ? c.axis_y2_tick_format : b.defaultValueFormat;
        return d(a)
    },f.defaultValueFormat = function (a) {
        return j(a) ? +a : ""
    },f.defaultArcValueFormat = function (a, b) {
        return (100 * b).toFixed(1) + "%"
    },f.formatByAxisId = function (a) {
        var b = this, c = b.config.data_labels, d = function (a) {
            return j(a) ? +a : ""
        };
        return "function" == typeof c.format ? d = c.format : "object" == typeof c.format && c.format[a] && (d = c.format[a]), d
    },f.hasCaches = function (a) {
        for (var b = 0; b < a.length; b++)if (!(a[b]in this.cache))return !1;
        return !0
    },f.addCache = function (a, b) {
        this.cache[a] = this.cloneTarget(b)
    },f.getCaches = function (a) {
        var b, c = [];
        for (b = 0; b < a.length; b++)a[b]in this.cache && c.push(this.cloneTarget(this.cache[a[b]]));
        return c
    };
    var i = f.CLASS = {
        target: "c3-target",
        chart: "c3-chart",
        chartLine: "c3-chart-line",
        chartLines: "c3-chart-lines",
        chartBar: "c3-chart-bar",
        chartBars: "c3-chart-bars",
        chartText: "c3-chart-text",
        chartTexts: "c3-chart-texts",
        chartArc: "c3-chart-arc",
        chartArcs: "c3-chart-arcs",
        chartArcsTitle: "c3-chart-arcs-title",
        chartArcsBackground: "c3-chart-arcs-background",
        chartArcsGaugeUnit: "c3-chart-arcs-gauge-unit",
        chartArcsGaugeMax: "c3-chart-arcs-gauge-max",
        chartArcsGaugeMin: "c3-chart-arcs-gauge-min",
        selectedCircle: "c3-selected-circle",
        selectedCircles: "c3-selected-circles",
        eventRect: "c3-event-rect",
        eventRects: "c3-event-rects",
        eventRectsSingle: "c3-event-rects-single",
        eventRectsMultiple: "c3-event-rects-multiple",
        zoomRect: "c3-zoom-rect",
        brush: "c3-brush",
        focused: "c3-focused",
        defocused: "c3-defocused",
        region: "c3-region",
        regions: "c3-regions",
        tooltipContainer: "c3-tooltip-container",
        tooltip: "c3-tooltip",
        tooltipName: "c3-tooltip-name",
        shape: "c3-shape",
        shapes: "c3-shapes",
        line: "c3-line",
        lines: "c3-lines",
        bar: "c3-bar",
        bars: "c3-bars",
        circle: "c3-circle",
        circles: "c3-circles",
        arc: "c3-arc",
        arcs: "c3-arcs",
        area: "c3-area",
        areas: "c3-areas",
        empty: "c3-empty",
        text: "c3-text",
        texts: "c3-texts",
        gaugeValue: "c3-gauge-value",
        grid: "c3-grid",
        gridLines: "c3-grid-lines",
        xgrid: "c3-xgrid",
        xgrids: "c3-xgrids",
        xgridLine: "c3-xgrid-line",
        xgridLines: "c3-xgrid-lines",
        xgridFocus: "c3-xgrid-focus",
        ygrid: "c3-ygrid",
        ygrids: "c3-ygrids",
        ygridLine: "c3-ygrid-line",
        ygridLines: "c3-ygrid-lines",
        axis: "c3-axis",
        axisX: "c3-axis-x",
        axisXLabel: "c3-axis-x-label",
        axisY: "c3-axis-y",
        axisYLabel: "c3-axis-y-label",
        axisY2: "c3-axis-y2",
        axisY2Label: "c3-axis-y2-label",
        legendBackground: "c3-legend-background",
        legendItem: "c3-legend-item",
        legendItemEvent: "c3-legend-item-event",
        legendItemTile: "c3-legend-item-tile",
        legendItemHidden: "c3-legend-item-hidden",
        legendItemFocused: "c3-legend-item-focused",
        dragarea: "c3-dragarea",
        EXPANDED: "_expanded_",
        SELECTED: "_selected_",
        INCLUDED: "_included_"
    };
    f.generateClass = function (a, b) {
        return " " + a + " " + a + this.getTargetSelectorSuffix(b)
    }, f.classText = function (a) {
        return this.generateClass(i.text, a.index)
    }, f.classTexts = function (a) {
        return this.generateClass(i.texts, a.id)
    }, f.classShape = function (a) {
        return this.generateClass(i.shape, a.index)
    }, f.classShapes = function (a) {
        return this.generateClass(i.shapes, a.id)
    }, f.classLine = function (a) {
        return this.classShape(a) + this.generateClass(i.line, a.id)
    }, f.classLines = function (a) {
        return this.classShapes(a) + this.generateClass(i.lines, a.id)
    }, f.classCircle = function (a) {
        return this.classShape(a) + this.generateClass(i.circle, a.index)
    }, f.classCircles = function (a) {
        return this.classShapes(a) + this.generateClass(i.circles, a.id)
    }, f.classBar = function (a) {
        return this.classShape(a) + this.generateClass(i.bar, a.index)
    }, f.classBars = function (a) {
        return this.classShapes(a) + this.generateClass(i.bars, a.id)
    }, f.classArc = function (a) {
        return this.classShape(a.data) + this.generateClass(i.arc, a.data.id)
    }, f.classArcs = function (a) {
        return this.classShapes(a.data) + this.generateClass(i.arcs, a.data.id)
    }, f.classArea = function (a) {
        return this.classShape(a) + this.generateClass(i.area, a.id)
    }, f.classAreas = function (a) {
        return this.classShapes(a) + this.generateClass(i.areas, a.id)
    }, f.classRegion = function (a, b) {
        return this.generateClass(i.region, b) + " " + ("class"in a ? a["class"] : "")
    }, f.classEvent = function (a) {
        return this.generateClass(i.eventRect, a.index)
    }, f.classTarget = function (a) {
        var b = this, c = b.config.data_classes[a], d = "";
        return c && (d = " " + i.target + "-" + c), b.generateClass(i.target, a) + d
    }, f.classFocus = function (a) {
        return this.classFocused(a) + this.classDefocused(a)
    }, f.classFocused = function (a) {
        return " " + (this.focusedTargetIds.indexOf(a.id) >= 0 ? i.focused : "")
    }, f.classDefocused = function (a) {
        return " " + (this.defocusedTargetIds.indexOf(a.id) >= 0 ? i.defocused : "")
    }, f.classChartText = function (a) {
        return i.chartText + this.classTarget(a.id)
    }, f.classChartLine = function (a) {
        return i.chartLine + this.classTarget(a.id)
    }, f.classChartBar = function (a) {
        return i.chartBar + this.classTarget(a.id)
    }, f.classChartArc = function (a) {
        return i.chartArc + this.classTarget(a.data.id)
    }, f.getTargetSelectorSuffix = function (a) {
        return a || 0 === a ? ("-" + a).replace(/[\s?!@#$%^&*()_=+,.<>'":;\[\]\/|~`{}\\]/g, "-") : ""
    }, f.selectorTarget = function (a, b) {
        return (b || "") + "." + i.target + this.getTargetSelectorSuffix(a)
    }, f.selectorTargets = function (a, b) {
        var c = this;
        return a = a || [], a.length ? a.map(function (a) {
            return c.selectorTarget(a, b)
        }) : null
    }, f.selectorLegend = function (a) {
        return "." + i.legendItem + this.getTargetSelectorSuffix(a)
    }, f.selectorLegends = function (a) {
        var b = this;
        return a && a.length ? a.map(function (a) {
            return b.selectorLegend(a)
        }) : null
    };
    var j = f.isValue = function (a) {
        return a || 0 === a
    }, k = f.isFunction = function (a) {
        return "function" == typeof a
    }, l = f.isString = function (a) {
        return "string" == typeof a
    }, m = f.isUndefined = function (a) {
        return "undefined" == typeof a
    }, n = f.isDefined = function (a) {
        return "undefined" != typeof a
    }, o = f.ceil10 = function (a) {
        return 10 * Math.ceil(a / 10)
    }, p = f.asHalfPixel = function (a) {
        return Math.ceil(a) + .5
    }, q = f.diffDomain = function (a) {
        return a[1] - a[0]
    }, r = f.isEmpty = function (a) {
        return !a || l(a) && 0 === a.length || "object" == typeof a && 0 === Object.keys(a).length
    }, s = f.notEmpty = function (a) {
        return Object.keys(a).length > 0
    }, t = f.getOption = function (a, b, c) {
        return n(a[b]) ? a[b] : c
    }, u = f.hasValue = function (a, b) {
        var c = !1;
        return Object.keys(a).forEach(function (d) {
            a[d] === b && (c = !0)
        }), c
    }, v = f.getPathBox = function (a) {
        var b = a.getBoundingClientRect(), c = [a.pathSegList.getItem(0), a.pathSegList.getItem(1)], d = c[0].x, e = Math.min(c[0].y, c[1].y);
        return {x: d, y: e, width: b.width, height: b.height}
    };
    e.focus = function (a) {
        var b, c = this.internal;
        a = c.mapToTargetIds(a), b = c.svg.selectAll(c.selectorTargets(a.filter(c.isTargetToShow, c))), this.revert(), this.defocus(), b.classed(i.focused, !0).classed(i.defocused, !1), c.hasArcType() && c.expandArc(a), c.toggleFocusLegend(a, !0), c.focusedTargetIds = a, c.defocusedTargetIds = c.defocusedTargetIds.filter(function (b) {
            return a.indexOf(b) < 0
        })
    }, e.defocus = function (a) {
        var b, c = this.internal;
        a = c.mapToTargetIds(a), b = c.svg.selectAll(c.selectorTargets(a.filter(c.isTargetToShow, c))), this.revert(), b.classed(i.focused, !1).classed(i.defocused, !0), c.hasArcType() && c.unexpandArc(a), c.toggleFocusLegend(a, !1), c.focusedTargetIds = c.focusedTargetIds.filter(function (b) {
            return a.indexOf(b) < 0
        }), c.defocusedTargetIds = a
    }, e.revert = function (a) {
        var b, c = this.internal;
        a = c.mapToTargetIds(a), b = c.svg.selectAll(c.selectorTargets(a)), b.classed(i.focused, !1).classed(i.defocused, !1), c.hasArcType() && c.unexpandArc(a), c.config.legend_show && c.showLegend(a.filter(c.isLegendToShow.bind(c))), c.focusedTargetIds = [], c.defocusedTargetIds = []
    }, e.show = function (a, b) {
        var c, d = this.internal;
        a = d.mapToTargetIds(a), b = b || {}, d.removeHiddenTargetIds(a), c = d.svg.selectAll(d.selectorTargets(a)), c.transition().style("opacity", 1, "important").call(d.endall, function () {
            c.style("opacity", null).style("opacity", 1)
        }), b.withLegend && d.showLegend(a), d.redraw({withUpdateOrgXDomain: !0, withUpdateXDomain: !0, withLegend: !0})
    }, e.hide = function (a, b) {
        var c, d = this.internal;
        a = d.mapToTargetIds(a), b = b || {}, d.addHiddenTargetIds(a), c = d.svg.selectAll(d.selectorTargets(a)), c.transition().style("opacity", 0, "important").call(d.endall, function () {
            c.style("opacity", null).style("opacity", 0)
        }), b.withLegend && d.hideLegend(a), d.redraw({withUpdateOrgXDomain: !0, withUpdateXDomain: !0, withLegend: !0})
    }, e.toggle = function (a) {
        var b = this, c = this.internal;
        c.mapToTargetIds(a).forEach(function (a) {
            c.isTargetToShow(a) ? b.hide(a) : b.show(a)
        })
    }, e.zoom = function (a) {
        var b = this.internal;
        return a && (b.isTimeSeries() && (a = a.map(function (a) {
            return b.parseDate(a)
        })), b.brush.extent(a), b.redraw({
            withUpdateXDomain: !0,
            withY: b.config.zoom_rescale
        }), b.config.zoom_onzoom.call(this, b.x.orgDomain())), b.brush.extent()
    }, e.zoom.enable = function (a) {
        var b = this.internal;
        b.config.zoom_enabled = a, b.updateAndRedraw()
    }, e.unzoom = function () {
        var a = this.internal;
        a.brush.clear().update(), a.redraw({withUpdateXDomain: !0})
    }, e.load = function (a) {
        var b = this.internal, c = b.config;
        return a.xs && b.addXs(a.xs), "classes"in a && Object.keys(a.classes).forEach(function (b) {
            c.data_classes[b] = a.classes[b]
        }), "categories"in a && b.isCategorized() && (c.axis_x_categories = a.categories), "axes"in a && Object.keys(a.axes).forEach(function (b) {
            c.data_axes[b] = a.axes[b]
        }), "cacheIds"in a && b.hasCaches(a.cacheIds) ? void b.load(b.getCaches(a.cacheIds), a.done) : void("unload"in a ? b.unload(b.mapToTargetIds("boolean" == typeof a.unload && a.unload ? null : a.unload), function () {
            b.loadFromArgs(a)
        }) : b.loadFromArgs(a))
    }, e.unload = function (a) {
        var b = this.internal;
        a = a || {}, a instanceof Array ? a = {ids: a} : "string" == typeof a && (a = {ids: [a]}), b.unload(b.mapToTargetIds(a.ids), function () {
            b.redraw({withUpdateOrgXDomain: !0, withUpdateXDomain: !0, withLegend: !0}), a.done && a.done()
        })
    }, e.flow = function (a) {
        var b, c, d, e, f, g, h, i, k = this.internal, l = [], m = k.getMaxDataCount(), o = 0, p = 0;
        if (a.json)c = k.convertJsonToData(a.json, a.keys); else if (a.rows)c = k.convertRowsToData(a.rows); else {
            if (!a.columns)return;
            c = k.convertColumnsToData(a.columns)
        }
        b = k.convertDataToTargets(c, !0), k.data.targets.forEach(function (a) {
            var c, d, e = !1;
            for (c = 0; c < b.length; c++)if (a.id === b[c].id) {
                for (e = !0, a.values[a.values.length - 1] && (p = a.values[a.values.length - 1].index + 1), o = b[c].values.length, d = 0; o > d; d++)b[c].values[d].index = p + d, k.isTimeSeries() || (b[c].values[d].x = p + d);
                a.values = a.values.concat(b[c].values), b.splice(c, 1);
                break
            }
            e || l.push(a.id)
        }), k.data.targets.forEach(function (a) {
            var b, c;
            for (b = 0; b < l.length; b++)if (a.id === l[b])for (p = a.values[a.values.length - 1].index + 1, c = 0; o > c; c++)a.values.push({
                id: a.id,
                index: p + c,
                x: k.isTimeSeries() ? k.getOtherTargetX(p + c) : p + c,
                value: null
            })
        }), k.data.targets.length && b.forEach(function (a) {
            var b, c = [];
            for (b = k.data.targets[0].values[0].index; p > b; b++)c.push({
                id: a.id,
                index: b,
                x: k.isTimeSeries() ? k.getOtherTargetX(b) : b,
                value: null
            });
            a.values.forEach(function (a) {
                a.index += p, k.isTimeSeries() || (a.x += p)
            }), a.values = c.concat(a.values)
        }), k.data.targets = k.data.targets.concat(b), d = k.getMaxDataCount(), f = k.data.targets[0], g = f.values[0], n(a.to) ? (o = 0, i = k.isTimeSeries() ? k.parseDate(a.to) : a.to, f.values.forEach(function (a) {
            a.x < i && o++
        })) : n(a.length) && (o = a.length), m ? 1 === m && k.isTimeSeries() && (h = (f.values[f.values.length - 1].x - g.x) / 2, e = [new Date(+g.x - h), new Date(+g.x + h)], k.updateXDomain(null, !0, !0, !1, e)) : (h = k.isTimeSeries() ? f.values.length > 1 ? f.values[f.values.length - 1].x - g.x : g.x - k.getXDomain(k.data.targets)[0] : 1, e = [g.x - h, g.x], k.updateXDomain(null, !0, !0, !1, e)), k.updateTargets(k.data.targets), k.redraw({
            flow: {
                index: g.index,
                length: o,
                duration: j(a.duration) ? a.duration : k.config.transition_duration,
                done: a.done,
                orgDataCount: m
            }, withLegend: !0, withTransition: m > 1, withTrimXDomain: !1, withUpdateXAxis: !0
        })
    }, f.generateFlow = function (a) {
        var b = this, c = b.config, d = b.d3;
        return function () {
            var e, f, g, h = a.targets, j = a.flow, k = a.drawBar, l = a.drawLine, m = a.drawArea, n = a.cx, o = a.cy, p = a.xv, r = a.xForText, s = a.yForText, t = a.duration, u = 1, v = j.index, w = j.length, x = b.getValueOnIndex(b.data.targets[0].values, v), y = b.getValueOnIndex(b.data.targets[0].values, v + w), z = b.x.domain(), A = j.duration || t, B = j.done || function () {
                }, C = b.generateWait(), D = b.xgrid || d.selectAll([]), E = b.xgridLines || d.selectAll([]), F = b.mainRegion || d.selectAll([]), G = b.mainText || d.selectAll([]), H = b.mainBar || d.selectAll([]), I = b.mainLine || d.selectAll([]), J = b.mainArea || d.selectAll([]), K = b.mainCircle || d.selectAll([]);
            b.flowing = !0, b.data.targets.forEach(function (a) {
                a.values.splice(0, w)
            }), g = b.updateXDomain(h, !0, !0), b.updateXGrid && b.updateXGrid(!0), j.orgDataCount ? e = 1 === j.orgDataCount || x.x === y.x ? b.x(z[0]) - b.x(g[0]) : b.isTimeSeries() ? b.x(z[0]) - b.x(g[0]) : b.x(x.x) - b.x(y.x) : 1 !== b.data.targets[0].values.length ? e = b.x(z[0]) - b.x(g[0]) : b.isTimeSeries() ? (x = b.getValueOnIndex(b.data.targets[0].values, 0), y = b.getValueOnIndex(b.data.targets[0].values, b.data.targets[0].values.length - 1), e = b.x(x.x) - b.x(y.x)) : e = q(g) / 2, u = q(z) / q(g), f = "translate(" + e + ",0) scale(" + u + ",1)", b.hideXGridFocus(), b.hideTooltip(), d.transition().ease("linear").duration(A).each(function () {
                C.add(b.axes.x.transition().call(b.xAxis)), C.add(H.transition().attr("transform", f)), C.add(I.transition().attr("transform", f)), C.add(J.transition().attr("transform", f)), C.add(K.transition().attr("transform", f)), C.add(G.transition().attr("transform", f)), C.add(F.filter(b.isRegionOnX).transition().attr("transform", f)), C.add(D.transition().attr("transform", f)), C.add(E.transition().attr("transform", f))
            }).call(C, function () {
                var a, d = [], e = [], f = [];
                if (w) {
                    for (a = 0; w > a; a++)d.push("." + i.shape + "-" + (v + a)), e.push("." + i.text + "-" + (v + a)), f.push("." + i.eventRect + "-" + (v + a));
                    b.svg.selectAll("." + i.shapes).selectAll(d).remove(), b.svg.selectAll("." + i.texts).selectAll(e).remove(), b.svg.selectAll("." + i.eventRects).selectAll(f).remove(), b.svg.select("." + i.xgrid).remove()
                }
                D.attr("transform", null).attr(b.xgridAttr), E.attr("transform", null), E.select("line").attr("x1", c.axis_rotated ? 0 : p).attr("x2", c.axis_rotated ? b.width : p), E.select("text").attr("x", c.axis_rotated ? b.width : 0).attr("y", p), H.attr("transform", null).attr("d", k), I.attr("transform", null).attr("d", l), J.attr("transform", null).attr("d", m), K.attr("transform", null).attr("cx", n).attr("cy", o), G.attr("transform", null).attr("x", r).attr("y", s).style("fill-opacity", b.opacityForText.bind(b)), F.attr("transform", null), F.select("rect").filter(b.isRegionOnX).attr("x", b.regionX.bind(b)).attr("width", b.regionWidth.bind(b)), c.interaction_enabled && b.redrawEventRect(), B(), b.flowing = !1
            })
        }
    }, e.selected = function (a) {
        var b = this.internal, c = b.d3;
        return c.merge(b.main.selectAll("." + i.shapes + b.getTargetSelectorSuffix(a)).selectAll("." + i.shape).filter(function () {
            return c.select(this).classed(i.SELECTED)
        }).map(function (a) {
            return a.map(function (a) {
                var b = a.__data__;
                return b.data ? b.data : b
            })
        }))
    }, e.select = function (a, b, c) {
        var d = this.internal, e = d.d3, f = d.config;
        f.data_selection_enabled && d.main.selectAll("." + i.shapes).selectAll("." + i.shape).each(function (g, h) {
            var j = e.select(this), k = g.data ? g.data.id : g.id, l = d.getToggle(this, g).bind(d), m = f.data_selection_grouped || !a || a.indexOf(k) >= 0, o = !b || b.indexOf(h) >= 0, p = j.classed(i.SELECTED);
            j.classed(i.line) || j.classed(i.area) || (m && o ? f.data_selection_isselectable(g) && !p && l(!0, j.classed(i.SELECTED, !0), g, h) : n(c) && c && p && l(!1, j.classed(i.SELECTED, !1), g, h))
        })
    }, e.unselect = function (a, b) {
        var c = this.internal, d = c.d3, e = c.config;
        e.data_selection_enabled && c.main.selectAll("." + i.shapes).selectAll("." + i.shape).each(function (f, g) {
            var h = d.select(this), j = f.data ? f.data.id : f.id, k = c.getToggle(this, f).bind(c), l = e.data_selection_grouped || !a || a.indexOf(j) >= 0, m = !b || b.indexOf(g) >= 0, n = h.classed(i.SELECTED);
            h.classed(i.line) || h.classed(i.area) || l && m && e.data_selection_isselectable(f) && n && k(!1, h.classed(i.SELECTED, !1), f, g)
        })
    }, e.transform = function (a, b) {
        var c = this.internal, d = ["pie", "donut"].indexOf(a) >= 0 ? {withTransform: !0} : null;
        c.transformTo(b, a, d)
    }, f.transformTo = function (a, b, c) {
        var d = this, e = !d.hasArcType(), f = c || {withTransitionForAxis: e};
        f.withTransitionForTransform = !1, d.transiting = !1, d.setTargetType(a, b), d.updateAndRedraw(f)
    }, e.groups = function (a) {
        var b = this.internal, c = b.config;
        return m(a) ? c.data_groups : (c.data_groups = a, b.redraw(), c.data_groups)
    }, e.xgrids = function (a) {
        var b = this.internal, c = b.config;
        return a ? (c.grid_x_lines = a, b.redrawWithoutRescale(), c.grid_x_lines) : c.grid_x_lines
    }, e.xgrids.add = function (a) {
        var b = this.internal;
        return this.xgrids(b.config.grid_x_lines.concat(a ? a : []))
    }, e.xgrids.remove = function (a) {
        var b = this.internal;
        b.removeGridLines(a, !0)
    }, e.ygrids = function (a) {
        var b = this.internal, c = b.config;
        return a ? (c.grid_y_lines = a, b.redrawWithoutRescale(), c.grid_y_lines) : c.grid_y_lines
    }, e.ygrids.add = function (a) {
        var b = this.internal;
        return this.ygrids(b.config.grid_y_lines.concat(a ? a : []))
    }, e.ygrids.remove = function (a) {
        var b = this.internal;
        b.removeGridLines(a, !1)
    }, e.regions = function (a) {
        var b = this.internal, c = b.config;
        return a ? (c.regions = a, b.redrawWithoutRescale(), c.regions) : c.regions
    }, e.regions.add = function (a) {
        var b = this.internal, c = b.config;
        return a ? (c.regions = c.regions.concat(a), b.redrawWithoutRescale(), c.regions) : c.regions
    }, e.regions.remove = function (a) {
        var b, c, d, e = this.internal, f = e.config;
        return a = a || {}, b = e.getOption(a, "duration", f.transition_duration), c = e.getOption(a, "classes", [i.region]), d = e.main.select("." + i.regions).selectAll(c.map(function (a) {
            return "." + a
        })), (b ? d.transition().duration(b) : d).style("opacity", 0).remove(), f.regions = f.regions.filter(function (a) {
            var b = !1;
            return a["class"] ? (a["class"].split(" ").forEach(function (a) {
                c.indexOf(a) >= 0 && (b = !0)
            }), !b) : !0
        }), f.regions
    }, e.data = function (a) {
        var b = this.internal.data.targets;
        return "undefined" == typeof a ? b : b.filter(function (b) {
            return [].concat(a).indexOf(b.id) >= 0
        })
    }, e.data.shown = function (a) {
        return this.internal.filterTargetsToShow(this.data(a))
    }, e.data.values = function (a) {
        var b, c = null;
        return a && (b = this.data(a), c = b[0] ? b[0].values.map(function (a) {
            return a.value
        }) : null), c
    }, e.data.names = function (a) {
        return this.internal.clearLegendItemTextBoxCache(), this.internal.updateDataAttributes("names", a)
    }, e.data.colors = function (a) {
        return this.internal.updateDataAttributes("colors", a)
    }, e.data.axes = function (a) {
        return this.internal.updateDataAttributes("axes", a)
    }, e.category = function (a, b) {
        var c = this.internal, d = c.config;
        return arguments.length > 1 && (d.axis_x_categories[a] = b, c.redraw()), d.axis_x_categories[a]
    }, e.categories = function (a) {
        var b = this.internal, c = b.config;
        return arguments.length ? (c.axis_x_categories = a, b.redraw(), c.axis_x_categories) : c.axis_x_categories
    }, e.color = function (a) {
        var b = this.internal;
        return b.color(a)
    }, e.x = function (a) {
        var b = this.internal;
        return arguments.length && (b.updateTargetX(b.data.targets, a), b.redraw({
            withUpdateOrgXDomain: !0,
            withUpdateXDomain: !0
        })), b.data.xs
    }, e.xs = function (a) {
        var b = this.internal;
        return arguments.length && (b.updateTargetXs(b.data.targets, a), b.redraw({
            withUpdateOrgXDomain: !0,
            withUpdateXDomain: !0
        })), b.data.xs
    }, e.axis = function () {
    }, e.axis.labels = function (a) {
        var b = this.internal;
        arguments.length && (Object.keys(a).forEach(function (c) {
            b.setAxisLabelText(c, a[c])
        }), b.updateAxisLabels())
    }, e.axis.max = function (a) {
        var b = this.internal, c = b.config;
        return arguments.length ? ("object" == typeof a ? (j(a.x) && (c.axis_x_max = a.x), j(a.y) && (c.axis_y_max = a.y), j(a.y2) && (c.axis_y2_max = a.y2)) : c.axis_y_max = c.axis_y2_max = a, void b.redraw({
            withUpdateOrgXDomain: !0,
            withUpdateXDomain: !0
        })) : {x: c.axis_x_max, y: c.axis_y_max, y2: c.axis_y2_max}
    }, e.axis.min = function (a) {
        var b = this.internal, c = b.config;
        return arguments.length ? ("object" == typeof a ? (j(a.x) && (c.axis_x_min = a.x), j(a.y) && (c.axis_y_min = a.y), j(a.y2) && (c.axis_y2_min = a.y2)) : c.axis_y_min = c.axis_y2_min = a, void b.redraw({
            withUpdateOrgXDomain: !0,
            withUpdateXDomain: !0
        })) : {x: c.axis_x_min, y: c.axis_y_min, y2: c.axis_y2_min}
    }, e.axis.range = function (a) {
        return arguments.length ? (n(a.max) && this.axis.max(a.max), void(n(a.min) && this.axis.min(a.min))) : {
            max: this.axis.max(),
            min: this.axis.min()
        }
    }, e.legend = function () {
    }, e.legend.show = function (a) {
        var b = this.internal;
        b.showLegend(b.mapToTargetIds(a)), b.updateAndRedraw({withLegend: !0})
    }, e.legend.hide = function (a) {
        var b = this.internal;
        b.hideLegend(b.mapToTargetIds(a)), b.updateAndRedraw({withLegend: !0})
    }, e.resize = function (a) {
        var b = this.internal, c = b.config;
        c.size_width = a ? a.width : null, c.size_height = a ? a.height : null, this.flush()
    }, e.flush = function () {
        var a = this.internal;
        a.updateAndRedraw({withLegend: !0, withTransition: !1, withTransitionForTransform: !1})
    }, e.destroy = function () {
        var b = this.internal;
        b.data.targets = void 0, b.data.xs = {}, b.selectChart.classed("c3", !1).html(""), a.clearInterval(b.intervalForObserveInserted), a.onresize = null
    }, e.tooltip = function () {
    }, e.tooltip.show = function (a) {
        var b, c, d = this.internal;
        a.mouse && (c = a.mouse), a.data ? d.isMultipleX() ? (c = [d.x(a.data.x), d.getYScale(a.data.id)(a.data.value)], b = null) : b = j(a.data.index) ? a.data.index : d.getIndexByX(a.data.x) : "undefined" != typeof a.x ? b = d.getIndexByX(a.x) : "undefined" != typeof a.index && (b = a.index), d.dispatchEvent("mouseover", b, c), d.dispatchEvent("mousemove", b, c)
    }, e.tooltip.hide = function () {
        this.internal.dispatchEvent("mouseout", 0)
    };
    var w;
    "function" == typeof define && define.amd ? define("c3", ["d3"], g) : "undefined" != typeof exports && "undefined" != typeof module ? module.exports = g : a.c3 = g
}(window);