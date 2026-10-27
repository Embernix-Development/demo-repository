
@if (\App\Support\DemoMode::activeForCurrentUser())
    <style>
        [data-rino-demo-disabled="1"] {
            opacity: 0.45 !important;
            cursor: not-allowed !important;
        }

        [data-rino-embed-locked="1"] {
            opacity: 0.55 !important;
            cursor: not-allowed !important;
        }

        [data-rino-embed-locked="1"] textarea,
        [data-rino-embed-locked="1"] input,
        [data-rino-embed-locked="1"] [contenteditable],
        [data-rino-embed-locked="1"] .cm-content {
            pointer-events: none !important;
            user-select: none !important;
            -webkit-user-select: none !important;
            cursor: not-allowed !important;
        }
    </style>

    <script>
        (() => {
            if (window.__rinoDemoExplorerV5) return;
            window.__rinoDemoExplorerV5 = true;

            // Commit actions only. New/Edit navigation stays enabled.
            const blocked = /\b(save|create|update|delete|remove|upload|publish|unpublish|restore|reset|submit|import|duplicate|clone|approve|reject|archive|attach|detach|sync|apply changes|bulk delete)\b/i;

            const navigation = /\b(new|edit|view|preview|open|manage|browse|back|cancel|close|search|filter|sort|refresh|login|logout)\b/i;

            const selector = [
                'button',
                'input[type="submit"]',
                'input[type="button"]',
                'input[type="file"]',
                '[role="button"]',
                '[role="menuitem"]'
            ].join(',');

            function isBlocked(el) {
                if (el.matches('input[type="file"]')) {
                    return true;
                }

                // Allow opening create/edit pages.
                if (el.closest('a[href]')) {
                    return false;
                }

                const label = [
                    el.textContent,
                    el.getAttribute('aria-label'),
                    el.getAttribute('title')
                ].filter(Boolean).join(' ').trim();

                const action = [
                    el.getAttribute('wire:click'),
                    el.getAttribute('wire:submit'),
                    el.getAttribute('x-on:click')
                ].filter(Boolean).join(' ');

                if (navigation.test(label) && !blocked.test(action)) {
                    return false;
                }

                if (blocked.test(label) || blocked.test(action)) {
                    return true;
                }

                if (el.matches('[type="submit"]')) {
                    const form = el.closest('form');

                    if (
                        form &&
                        !/login|logout|search|filter/i.test(
                            form.getAttribute('wire:submit') || ''
                        )
                    ) {
                        return true;
                    }
                }

                return false;
            }

            function disableAction(el) {
                if (!isBlocked(el)) return;

                el.dataset.rinoDemoDisabled = '1';
                el.setAttribute('aria-disabled', 'true');
                el.setAttribute('title', 'Disabled in demo mode');

                if (el.matches('button, input')) {
                    el.disabled = true;
                }
            }

            function lockEmbedField(wrapper) {
                if (wrapper.dataset.rinoEmbedLocked === '1') return;

                wrapper.dataset.rinoEmbedLocked = '1';
                wrapper.setAttribute(
                    'title',
                    'HTML / Embed locked in demo mode'
                );

                wrapper.querySelectorAll(
                    'textarea, input, [contenteditable], .cm-content'
                ).forEach(field => {
                    if (field.matches('textarea, input')) {
                        field.readOnly = true;
                        field.setAttribute('readonly', 'readonly');
                    }

                    if (field.hasAttribute('contenteditable')) {
                        field.setAttribute('contenteditable', 'false');
                    }

                    field.setAttribute('tabindex', '-1');
                    field.setAttribute('aria-disabled', 'true');
                    field.style.pointerEvents = 'none';
                    field.style.userSelect = 'none';

                    if (document.activeElement === field) {
                        field.blur();
                    }
                });

                wrapper.querySelectorAll(
                    'button, [role="button"]'
                ).forEach(button => {
                    button.dataset.rinoDemoDisabled = '1';
                    button.setAttribute('aria-disabled', 'true');
                    button.setAttribute(
                        'title',
                        'Disabled in demo mode'
                    );

                    if (button.matches('button')) {
                        button.disabled = true;
                    }
                });
            }

            function scanEmbedFields() {
                // Standard Filament field wrappers.
                document.querySelectorAll(
                    '.fi-fo-field-wrp'
                ).forEach(wrapper => {
                    const label = wrapper.querySelector(
                        '.fi-fo-field-wrp-label, label'
                    );

                    if (!label) return;

                    const labelText = (
                        label.textContent || ''
                    )
                        .replace(/\*/g, '')
                        .replace(/\s+/g, ' ')
                        .trim();

                    // The actual label from your screenshot.
                    if (
                        !/^(HTML\s*\/\s*Embed|Embed Code)$/i.test(
                            labelText
                        )
                    ) {
                        return;
                    }

                    lockEmbedField(wrapper);
                });

                // Fallback for fields named embed_code or embed_html.
                document.querySelectorAll(
                    'textarea, input, [contenteditable]'
                ).forEach(field => {
                    const identity = [
                        field.name || '',
                        field.id || '',
                        field.getAttribute('wire:model') || '',
                        field.getAttribute('wire:model.live') || '',
                        field.getAttribute('aria-label') || ''
                    ].join(' ');

                    if (
                        !/embed[_\-\s]?(code|html)/i.test(identity)
                    ) {
                        return;
                    }

                    const wrapper = field.closest(
                        '.fi-fo-field-wrp, .fi-fo-field, [data-field-wrapper]'
                    );

                    if (wrapper) {
                        lockEmbedField(wrapper);
                    } else {
                        field.readOnly = true;
                        field.setAttribute('readonly', 'readonly');
                        field.setAttribute('tabindex', '-1');
                        field.style.pointerEvents = 'none';
                        field.style.userSelect = 'none';
                    }
                });
            }

            function scan() {
                document.querySelectorAll(selector)
                    .forEach(disableAction);

                scanEmbedFields();
            }

            // Prevent disabled action clicks.
            document.addEventListener('click', event => {
                if (
                    event.target.closest?.(
                        '[data-rino-embed-locked="1"]'
                    )
                ) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    return;
                }

                const control = event.target.closest?.(selector);

                if (!control || !isBlocked(control)) return;

                event.preventDefault();
                event.stopImmediatePropagation();
            }, true);

            // Prevent form submissions by demo accounts.
            document.addEventListener('submit', event => {
                const form = event.target;

                if (
                    form.matches('[wire\\:submit]') &&
                    !/login|logout|search|filter/i.test(
                        form.getAttribute('wire:submit') || ''
                    )
                ) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }
            }, true);

            // Prevent selecting, typing, and copying embed code.
            [
                'mousedown',
                'keydown',
                'paste',
                'drop',
                'copy',
                'cut'
            ].forEach(type => {
                document.addEventListener(type, event => {
                    if (
                        event.target.closest?.(
                            '[data-rino-embed-locked="1"]'
                        )
                    ) {
                        event.preventDefault();
                        event.stopImmediatePropagation();
                    }
                }, true);
            });

            const start = () => {
                scan();

                // Handle dynamically rendered Filament/Livewire fields.
                new MutationObserver(() => scan()).observe(
                    document.body,
                    {
                        childList: true,
                        subtree: true
                    }
                );
            };

            if (document.readyState === 'loading') {
                document.addEventListener(
                    'DOMContentLoaded',
                    start,
                    { once: true }
                );
            } else {
                start();
            }
        })();
    </script>
@endif
