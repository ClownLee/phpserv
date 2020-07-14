<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SnapSVG</title>
    <style>
        * { padding: 0; margin: 0; }
    </style>
</head>
<body>
    <svg id="svg" style="height: calc(99.4vh); width: calc(99.2vw);"></svg>
    <script src="/static/js/snap.svg.js" ></script>
    <script>
        var svg = Snap('#svg');
        var path = svg.paper.path({d: 'M0.500,65.500 C18.680,33.758 45.141,-6.797 72.500,2.500 C99.859,11.797 72.148,59.027 79.500,98.500 C86.852,137.973 117.668,128.914 138.500,59.500 C159.332,-9.914 246.500,59.500 246.500,59.500 C273.181,117.750 137.350,184.417 225.500,173.500 C351.137,157.940 155.369,160.617 162.500,86.500 C165.180,58.645 237.169,-2.418 283.500,2.500 C357.654,10.371 363.758,80.355 364.500,109.500', stroke:'#f00', fill: 'rgba(0,0,0,0)'});
        var length = Snap.path.getTotalLength(path);
        path.attr({
            'stroke-dashoffset': length,
            'stroke-dasharray': length  // 用Snap的API计算复杂的path长度
        });
        Snap.animate(length, 0, function(val) {
            path.attr({
                'stroke-dashoffset': val
            });
        }, 1000, mina.easeout(), function() {
            console.log('animation end');
        });
    </script>
</body>
</html>
