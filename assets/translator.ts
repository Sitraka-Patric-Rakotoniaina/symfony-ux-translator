import { localeFallbacks } from '../var/translations/configuration';
import { trans, setLocaleFallbacks } from '@symfony/ux-translator';

setLocaleFallbacks(localeFallbacks);

export function getLocale(): string {
    const locale: HTMLDivElement | null = document.querySelector('#locale');

    return locale ? locale.dataset['locale'] : 'en';
}

export { trans };

export * from '../var/translations';