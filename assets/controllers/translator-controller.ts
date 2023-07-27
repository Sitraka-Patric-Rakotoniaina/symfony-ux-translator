import { Controller } from '@hotwired/stimulus';
import {trans} from "@symfony/ux-translator";
import {HOME_JOB_TITLE} from "../../var/translations";

export default class extends Controller<HTMLDivElement> {
    static targets: string[] = [
        'invitationTitleOutput',
        'invitationTitleOrganizationNameInput'
    ];

    declare readonly invitationTitleOutputTarget: HTMLSpanElement
    declare readonly invitationTitleOrganizationNameInputTarget: HTMLInputElement

    connect(): void {
        this.render();
    }

    render() {
        this.invitationTitleOutputTarget.textContent = trans(HOME_JOB_TITLE, {
            name: this.invitationTitleOrganizationNameInputTarget.value
        });
    }
}
