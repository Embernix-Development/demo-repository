
@if (config('rino-demo.enabled'))
@php
    $demoPalettes = [
        [
            'id' => 'default',
            'name' => 'Default',
            'colors' => [
                'bg-[#2563EB]',
                'bg-[#09090b]',
                'bg-[#18181b]',
                'bg-[#d4d4d8]',
            ],
        ],
        [
            'id' => 'amber',
            'name' => 'Amber',
            'colors' => [
                'bg-[#FFA60C]',
                'bg-[#09090b]',
                'bg-[#18181b]',
                'bg-[#d4d4d8]',
            ],
        ],
        [
            'id' => 'purple',
            'name' => 'Purple',
            'colors' => [
                'bg-[#7C3AED]',
                'bg-[#09090b]',
                'bg-[#18181b]',
                'bg-[#d4d4d8]',
            ],
        ],
        [
            'id' => 'maroon',
            'name' => 'Maroon',
            'colors' => [
                'bg-[#8B1E3F]',
                'bg-[#09090b]',
                'bg-[#18181b]',
                'bg-[#d4d4d8]',
            ],
        ],
        [
            'id' => 'emerald',
            'name' => 'Emerald',
            'colors' => [
                'bg-[#059669]',
                'bg-[#09090b]',
                'bg-[#18181b]',
                'bg-[#d4d4d8]',
            ],
        ],
    ];
@endphp

<div data-rino-demo>
    <button
        type="button"
        data-demo-open
        aria-label="Open demo customization"
        aria-haspopup="dialog"
        aria-controls="rino-demo-modal"
        aria-expanded="false"
        class="
            fixed bottom-5 left-5 z-[75]
            flex size-12 items-center justify-center
            rounded-full border-0
            bg-[var(--primary)]
            text-[var(--primary-text)]
            shadow-xl
            transition duration-200
            hover:-translate-y-0.5 hover:opacity-90
            focus-visible:outline-2
            focus-visible:outline-offset-2
            focus-visible:outline-[var(--primary)]
            cursor-pointer
        "
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="23"
            height="23"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
        >
            <path d="m9.06 11.9 8.07-8.06a2.85 2.85 0 1 1 4.03 4.03l-8.06 8.08"/>
            <path d="M7.07 14.94c-1.66 0-3 1.35-3 3.02 0 1.33-2.5 1.52-2 2.02 1.08 1.1 2.49 2.02 4 2.02 2.2 0 4-1.8 4-4.04a3.01 3.01 0 0 0-3-3.02z"/>
        </svg>
    </button>

    <dialog
        id="rino-demo-modal"
        data-demo-modal
        aria-labelledby="rino-demo-title"
        aria-describedby="rino-demo-description"
        class="
            fixed inset-0 m-auto
            w-[calc(100%-2rem)] max-w-[620px]
            max-h-[calc(100dvh-2rem)]
            overflow-y-auto
            rounded-[var(--radius-card)]
            border-0 p-0
            bg-[var(--surface)]
            text-[var(--text-body)]
            shadow-2xl
            backdrop:bg-black/70
            backdrop:backdrop-blur-md
            open:block
            not-open:hidden
        "
    >
        <div class="flex w-full flex-col">

            <header
                class="
                    flex items-start justify-between gap-4
                    px-6 pt-6 pb-5
                    max-sm:px-4 max-sm:pt-5
                "
            >
                <div class="flex min-w-0 items-center gap-3.5">

                    <div
                        class="
                            flex size-11 shrink-0
                            items-center justify-center
                            rounded-[var(--radius-button)]
                            bg-[color-mix(in_srgb,var(--primary)_13%,transparent)]
                            text-[var(--primary)]
                            max-sm:size-10
                        "
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="22"
                            height="22"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <path d="m9.06 11.9 8.07-8.06a2.85 2.85 0 1 1 4.03 4.03l-8.06 8.08"/>
                            <path d="M7.07 14.94c-1.66 0-3 1.35-3 3.02 0 1.33-2.5 1.52-2 2.02 1.08 1.1 2.49 2.02 4 2.02 2.2 0 4-1.8 4-4.04a3.01 3.01 0 0 0-3-3.02z"/>
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <h2
                            id="rino-demo-title"
                            class="
                                m-0 text-xl font-bold
                                leading-tight
                                text-[var(--text-heading)]
                                max-sm:text-lg
                            "
                        >
                            Customize the demo
                        </h2>

                        <p
                            id="rino-demo-description"
                            class="
                                mt-1.5 mb-0 text-sm
                                leading-relaxed
                                text-[var(--text-muted)]
                                max-sm:text-xs
                            "
                        >
                            Explore the storefront with different color presets.
                        </p>
                    </div>
                </div>

                <button
                    type="button"
                    data-demo-close
                    aria-label="Close demo customization"
                    class="
                        flex size-8 shrink-0
                        items-center justify-center
                        rounded-md border-0
                        bg-transparent
                        text-[var(--text-muted)]
                        transition-colors
                        hover:bg-[var(--surface-secondary)]
                        hover:text-[var(--text-heading)]
                        cursor-pointer
                    "
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="19"
                        height="19"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M18 6 6 18"/>
                        <path d="m6 6 12 12"/>
                    </svg>
                </button>
            </header>

            <div class="px-6 pb-6 max-sm:px-4 max-sm:pb-5">

                <h3
                    class="
                        mb-3 text-sm font-semibold
                        text-[var(--text-heading)]
                    "
                >
                    Color palettes
                </h3>

                <div
                    role="group"
                    aria-label="Choose a storefront palette"
                    class="
                        grid grid-cols-3 gap-2.5
                        max-sm:grid-cols-2
                        max-sm:gap-2
                    "
                >
                    @foreach ($demoPalettes as $palette)
                        <button
                            type="button"
                            data-demo-palette="{{ $palette['id'] }}"
                            data-selected="false"
                            aria-pressed="false"
                            aria-label="{{ $palette['name'] }} palette"
                            class="
                                group flex min-w-0 flex-col
                                justify-center gap-2.5
                                rounded-lg
                                border-2 border-transparent
                                bg-[var(--surface-secondary)]
                                px-3 py-2.5
                                text-left
                                text-[var(--text-heading)]
                                transition-colors duration-150
                                hover:border-[var(--text-muted)]
                                data-[selected=true]:border-[var(--primary)]
                                data-[selected=true]:hover:border-[var(--primary)]
                                focus-visible:outline-2
                                focus-visible:outline-offset-2
                                focus-visible:outline-[var(--primary)]
                                cursor-pointer
                            "
                        >
                            <span
                                class="
                                    flex items-center
                                    justify-between gap-2
                                "
                            >
                                <span
                                    class="
                                        truncate text-[13px]
                                        font-semibold
                                    "
                                >
                                    {{ $palette['name'] }}
                                </span>

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="15"
                                    height="15"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                    class="
                                        shrink-0
                                        text-[var(--primary)]
                                        opacity-0
                                        group-data-[selected=true]:opacity-100
                                    "
                                >
                                    <path d="m20 6-11 11-5-5"/>
                                </svg>
                            </span>

                            <span
                                class="
                                    flex h-4 w-full
                                    overflow-hidden rounded
                                "
                                aria-hidden="true"
                            >
                                @foreach ($palette['colors'] as $colorClass)
                                    <span
                                        class="min-w-0 flex-1 {{ $colorClass }}"
                                    ></span>
                                @endforeach
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>

            <footer
                class="
                    flex items-center
                    justify-between gap-4
                    border-t border-[var(--border)]
                    px-6 py-4
                    max-sm:flex-col
                    max-sm:items-stretch
                    max-sm:px-4
                "
            >
                <div class="flex min-w-0 items-center gap-3">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                        class="shrink-0 text-[var(--primary)]"
                    >
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>

                    <div class="flex min-w-0 flex-col gap-1">
                        <strong
                            class="
                                text-[13px] font-semibold
                                text-[var(--text-heading)]
                            "
                        >
                            Explore the admin panel
                        </strong>

                        <span
                            class="
                                text-xs text-[var(--text-muted)]
                            "
                        >
                            Try the template's management features.
                        </span>
                    </div>
                </div>

                <a
                    href="{{ url('/admin') }}"
                    class="
                        inline-flex min-h-11
                        shrink-0 items-center
                        justify-center gap-2
                        rounded-[var(--radius-button)]
                        bg-[var(--primary)]
                        px-4 py-2.5
                        text-[13px] font-semibold
                        text-[var(--primary-text)]
                        no-underline
                        transition-opacity
                        hover:opacity-90
                        hover:text-[var(--primary-text)]
                        focus-visible:outline-2
                        focus-visible:outline-offset-2
                        focus-visible:outline-[var(--primary)]
                        max-sm:w-full
                    "
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>

                    <span>Admin Panel</span>
                </a>
            </footer>
        </div>
    </dialog>
</div>

<script>
    (() => {
        const root = document.querySelector('[data-rino-demo]');

        if (!root) return;

        const trigger = root.querySelector('[data-demo-open]');
        const modal = root.querySelector('[data-demo-modal]');
        const closeButton = root.querySelector('[data-demo-close]');
        const paletteButtons = root.querySelectorAll('[data-demo-palette]');

        if (!trigger || !modal || !closeButton) return;

        const openModal = () => {
            if (modal.open) return;

            modal.showModal();
            trigger.setAttribute('aria-expanded', 'true');
        };

        const closeModal = () => {
            if (modal.open) modal.close();
        };

        trigger.addEventListener('click', openModal);
        closeButton.addEventListener('click', closeModal);

        modal.addEventListener('close', () => {
            trigger.setAttribute('aria-expanded', 'false');
        });

        modal.addEventListener('click', (event) => {
            if (event.target !== modal) return;

            const rect = modal.getBoundingClientRect();

            const inside =
                event.clientX >= rect.left &&
                event.clientX <= rect.right &&
                event.clientY >= rect.top &&
                event.clientY <= rect.bottom;

            if (!inside) closeModal();
        });

        const palettes = {
            default: {
                primary: '#2563EB',
                hover: '#1D4ED8',
                text: '#ffffff'
            },
            amber: {
                primary: '#FFA60C',
                hover: '#E68F00',
                text: '#18181b'
            },
            purple: {
                primary: '#7C3AED',
                hover: '#6D28D9',
                text: '#ffffff'
            },
            maroon: {
                primary: '#8B1E3F',
                hover: '#701832',
                text: '#ffffff'
            },
            emerald: {
                primary: '#059669',
                hover: '#047857',
                text: '#ffffff'
            }
        };

        const storageKey = 'rino-demo-palette';
        const html = document.documentElement;

        const applyPalette = (name) => {
            if (!Object.prototype.hasOwnProperty.call(palettes, name)) {
                name = 'default';
            }

            const palette = palettes[name];

            html.style.setProperty('--primary', palette.primary);
            html.style.setProperty('--primary-hover', palette.hover);
            html.style.setProperty('--primary-text', palette.text);

            paletteButtons.forEach((button) => {
                const selected = button.dataset.demoPalette === name;

                button.dataset.selected = String(selected);
                button.setAttribute('aria-pressed', String(selected));
            });

            try {
                localStorage.setItem(storageKey, name);
            } catch (error) {}
        };

        paletteButtons.forEach((button) => {
            button.addEventListener('click', () => {
                applyPalette(button.dataset.demoPalette);
            });
        });

        let savedPalette = 'default';

        try {
            savedPalette = localStorage.getItem(storageKey) || 'default';
        } catch (error) {}

        applyPalette(savedPalette);
    })();
</script>
@endif
