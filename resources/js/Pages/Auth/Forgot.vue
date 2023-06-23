<template>

  <Head title="Восстановление пароля" />
  <div class="flex items-center justify-center p-6 min-h-screen bg-red_cp">
    <div class="w-full max-w-md">

      <h1 class="text-3xl text-center font-bold text-white">Восстановление пароля</h1>
      <!-- <logo class="block mx-auto w-full max-w-xs fill-white" height="50" /> -->

      <div class="h-full p-6">
        <el-form ref="formRef" :model="form" label-width="100px"
          class="flex flex-col rounded-lg bg-white rounded-lg overflow-hidden" size="large" label-position="top">
          <div class="flex flex-wrap p-8">
            <el-form-item label="Email" placeholder="Email" prop="email" style="margin-bottom: 0;" :rules="[
              {
                required: true,
                message: 'Введите Email',
                trigger: 'blur',
              },
              {
                type: 'email',
                message: 'Введите корректный email',
                trigger: ['blur', 'change'],
              },
            ]" class="pb-0 w-full">
              <el-input v-model="form.email" autocomplete="off" />
            </el-form-item>
          </div>

          <div class="flex justify-between w-full px-4 py-4 bg-gray-50 border-t border-gray-100">
            <div class="grid content-center">
              <Link
                class="flex justify-start"
                href="/login"
                title="Вернуться к авторизации"
                style="margin-bottom: 0"
              >
              <el-icon class="mr-2"><ArrowLeft /></el-icon> <div>Вернуться</div>
              </Link>
            </div>
            <el-button type="success" @click="reset()" class="m-0">
              <el-icon class="mr-2">
                <Check />
              </el-icon> Восстановить
            </el-button>
          </div>
        </el-form>
      </div>

    </div>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { FormInstance, ElNotification } from "element-plus";

import Logo from '@/Shared/Logo'

export default {
  components: {
    Head,
    Logo,
    Link
  },
  data() {
    return {
      form: {
        email: '',
      },
    }
  },
  mounted() {
    if (localStorage.email) {
      this.form.email = localStorage.email
    }
  },
  methods: {
    async reset() {
      let self = this;

      axios
        .post(`/forgot-password`, {
          email: self.form.email,
        })
        .then(function (response) {
          if (response.data.status == 200) {
            ElNotification({
              title: response.data.msg,
              type: "success",
            });
            localStorage.removeItem('email')
          } else if (response.data.status == 400) {
            ElNotification({
              title: response.data.msg,
              type: "error",
            });
          } else {
            ElNotification({
              title: "Произошла ошибка. Данные не сохранены",
              type: "error",
            });
          }
        })
        .catch(function (error) {
          console.log(error);

          ElNotification({
              title: error.response.data.message,
              type: "error",
          });
          
        });
    }
  },
}
</script>
