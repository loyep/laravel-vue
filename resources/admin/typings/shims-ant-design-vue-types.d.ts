import Vue from 'vue';
import { Message } from 'ant-design-vue/types/message';
import { Notification } from 'ant-design-vue/types/notification';
import { ModalConfirm, ModalOptions } from 'ant-design-vue/types/modal';
import { Form } from 'ant-design-vue/types/form/form';

declare module 'vue/types/vue' {
  interface Vue {
    $message: Message;
    $notification : Notification;
    $info : (modalOptios: ModalOptions) => ModalConfirm;
    $error : (modalOptios: ModalOptions) => ModalConfirm;
    $warning : (modalOptios: ModalOptions) => ModalConfirm;
    $confirm : (modalOptios: ModalOptions) => ModalConfirm;
    $form: Form;
  }
}