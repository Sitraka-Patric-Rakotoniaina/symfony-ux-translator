import { Controller } from '@hotwired/stimulus';
import {LABELS_JOB_TITLE, trans} from "../translator";

export default class extends Controller<HTMLDivElement> {

    static targets: string[] = [
        "jobTitleOutput",
        "jobTitleInput"
    ];

    declare readonly jobTitleOutputTarget: HTMLSpanElement;
    private readonly jobTitleInputTarget: HTMLInputElement;

    connect(): void {
        this.render();
    }

    render () {
        this.jobTitleOutputTarget.textContent = trans(LABELS_JOB_TITLE, {
            name: this.jobTitleInputTarget.value
        });
    }
}
