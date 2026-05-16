<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Shop')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        /* ── Navbar ── */
        nav {
            background: #fff;
            border-bottom: 2px solid #e0e0e0;
            padding: 14px 30px;
            display: flex;
            align-items: center;
            gap: 30px;
        }
        nav .brand {
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            color: #222;
        }
        nav a {
            text-decoration: none;
            color: #555;
            font-size: 0.95rem;
        }
        nav a:hover, nav a.active { color: #000; font-weight: bold; }

        /* ── Page wrapper ── */
        .page { max-width: 900px; margin: 30px auto; padding: 0 20px; }

        /* ── Flash message ── */
        .flash {
            background: #d4edda;
            border: 1px solid #b8dfc5;
            color: #2d6a4f;
            padding: 10px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        /* ── Page heading row ── */
        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .heading h2 { font-size: 1.4rem; }

        /* ── Buttons ── */
        .btn {
            display: inline-block;
            padding: 7px 16px;
            border-radius: 5px;
            font-size: 0.85rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-primary   { background: #222; color: #fff; }
        .btn-secondary { background: #e0e0e0; color: #333; }
        .btn-warning   { background: #f0a500; color: #fff; }
        .btn-danger    { background: #e74c3c; color: #fff; }
        .btn-green     { background: #27ae60; color: #fff; }
        .btn:hover     { opacity: 0.85; }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; }
        th { background: #222; color: #fff; padding: 10px 14px; text-align: left; font-size: 0.85rem; }
        td { padding: 10px 14px; border-bottom: 1px solid #eee; font-size: 0.9rem; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fafafa; }

        /* ── Card (for forms) ── */
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            border: 1px solid #e0e0e0;
        }

        /* ── Form elements ── */
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: bold; margin-bottom: 5px; }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #888;
        }
        .error-msg { color: #e74c3c; font-size: 0.8rem; margin-top: 4px; }

        /* ── Badge ── */
        .badge {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 12px;
            font-size: 0.78rem;
            color: #fff;
        }
        .badge-dark  { background: #444; }
        .badge-green { background: #27ae60; }
        .badge-red   { background: #e74c3c; }
        .badge-gray  { background: #999; }

        /* ── Category grid ── */
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; }
        .cat-card {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 18px;
        }
        .cat-card h3 { font-size: 1rem; margin-bottom: 6px; }
        .cat-card p  { font-size: 0.82rem; color: #777; margin-bottom: 12px; }
        .cat-card .actions { display: flex; gap: 8px; flex-wrap: wrap; }

        /* ── Breadcrumb ── */
        .breadcrumb { font-size: 0.82rem; color: #999; margin-bottom: 16px; }
        .breadcrumb a { color: #555; text-decoration: none; }
        .breadcrumb a:hover { text-decoration: underline; }

        /* ── Empty state ── */
        .empty { text-align: center; padding: 40px; color: #aaa; font-size: 0.95rem; }

        .form-row { display: flex; gap: 10px; }
        .form-row .form-group { flex: 1; }
    </style>
</head>
<body>

<nav>
    <a class="brand" href="{{ route('products.index') }}">🛒 ShopApp</a>
    <a href="{{ route('products.index') }}"   class="{{ request()->routeIs('products.*')   ? 'active' : '' }}">Products</a>
    <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Categories</a>
</nav>

<div class="page">

    @if(session('success'))
        <div class="flash">✅ {{ session('success') }}</div>
    @endif

    @yield('content')

</div>

</body>
</html>
