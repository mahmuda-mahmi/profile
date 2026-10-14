<!DOCTYPE html>
<html lang="en" data-theme="silk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    
    {{-- Dynamic title --}}
    <title>{{ isset($title) ? $title . ' - Profile' : 'Profile' }}</title>
    
    {{-- Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        @media print {
            @page {
                size: A4 landscape;   /* or "letter landscape" */
                margin: 15mm;
            }

            nav, footer { display: none !important; }

            .overflow-x-auto {
                overflow: visible !important;
                width: 100% !important;
            }

            table {
                width: 100% !important;
                table-layout: fixed !important;
                font-size: 11px;
            }

            th, td {
                white-space: normal !important;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            tr {
                page-break-inside: avoid;
            }

            thead {
                display: table-header-group;  /* repeat header on every page */
            }
            thead {
                background: #f3f4f6 !important;
                border-bottom: 2px solid #000;
            }
            th, td {
                border: 1px solid #d1d5db;
                padding: 6px 8px;
            }
            tr:nth-child(even) {
                background: #f9fafb;
            }
            tbody tr {
                border-bottom: 1px solid #e5e7eb;
            }
            thead { display: table-header-group; }
            tr { page-break-inside: avoid; }
        }
        @page {
            size: A4 landscape;
            margin: 15mm;
            @bottom-right {
                content: "Page " counter(page) " of " counter(pages);
                font-size: 10px;
                color: #666;
            }
        }
    </style>
    
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <header class="print:hidden">
        <x-nav></x-nav>
    </header>

    <main class="flex-1 container mx-auto">
        {{ $slot }}
    </main>

    <footer class="footer footer-center bg-base-300 text-base-content p-4 print:hidden">
        <aside>
            <p>Copyright © {{ date('Y') }}. All rights reserved.</p>
        </aside>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('form[data-confirm]').forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!confirm(form.dataset.confirm)) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
    
    @stack('scripts')
</body>