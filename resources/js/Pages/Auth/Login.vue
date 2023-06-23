<template>
  <Head title="Авторизация" />

  <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-800">
    <div class="w-full max-w-md">
      <h1 class="text-3xl text-center font-bold text-white">
        Конструктор ориентировок
      </h1>
      <!-- <logo class="block mx-auto w-full max-w-xs fill-white" height="50" /> -->

      <div class="h-full p-6">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
          <el-form
            ref="formRef"
            :model="form"
            label-width="100px"
            class="flex flex-wrap rounded-lg"
            size="large"
            label-position="top"
          >
            <div class="flex flex-wrap p-8">
              <el-form-item
                label="Email"
                placeholder="Email"
                prop="email"
                class="w-full"
                :rules="[
                  {
                    required: true,
                    message: 'Введите поле Email',
                    trigger: 'blur',
                  },
                  {
                    type: 'email',
                    message: 'Введите корректный email',
                    trigger: ['blur', 'change'],
                  },
                ]"
              >
                <el-input v-model="form.email" autocomplete="off" />
              </el-form-item>

              <el-form-item
                label="Пароль"
                prop="password"
                class="w-full pass-wrapper"
              >
                <el-input
                  v-model="form.password"
                  :type="[onPasswordHidden == true ? 'password' : 'text']"
                  autocomplete="off"
                />
                <el-button class="absolute right-0" @click="tooglePasswordVisible" v-if="onPasswordHidden == true"
                  ><el-icon><Hide /></el-icon
                ></el-button>
                <el-button class="absolute right-0" @click="tooglePasswordVisible" v-if="onPasswordHidden == false"
                  ><el-icon><View /></el-icon
                ></el-button>
              </el-form-item>

              <div class="w-full text-right">
                <!-- Forgot password? -->
                <Link
                  class="inline-block leading-7 mb-6 t@ext-2xl"
                  href="/forgot-password"
                  title="Восстановить пароль"
                  style="margin-bottom: 0"
                  @click="saveEmailLocalstorage()"
                >
                  Восстановить пароль?
                </Link>
              </div>
            </div>

            <div
              class="flex justify-end w-full px-4 py-4 bg-gray-50 border-t border-gray-100"
            >
              <el-button type="success" @click="login()" class="m-0">
                <el-icon class="mr-2">
                  <Check />
                </el-icon>
                Войти
              </el-button>
            </div>
          </el-form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { FormInstance, ElNotification } from "element-plus";

import Logo from "@/Shared/Logo";

export default {
  components: {
    Head,
    Logo,
    Link,
  },
  data() {
    return {
      form: {
        email: 'admin@app.ru',
        password: '',
      },
      onPasswordHidden: true
    };
  },
  methods: {
    login() {
      let self = this;

      axios
        .post(`/login`, this.form)
        .then(function (response) {
          if (response.data.status == 200) {
            self.$inertia.visit("/");
          } else if (response.data.status == 400) {
            ElNotification({
              title: response.data.msg,
              type: "error",
            });
          }
        })
        .catch(function (error) {
          ElNotification({
            title: error.response.data.message,
            type: "error",
          });
        });
    },
    tooglePasswordVisible(){
      this.onPasswordHidden = !this.onPasswordHidden
    },
    saveEmailLocalstorage(){
      localStorage.email = this.form.email
    }
  },
};
</script>

<style>
.el-form--label-top .pass-wrapper {
  margin-bottom: 10px;
}
.el-form--label-top .pass-wrapper .el-input__inner {
  padding-right: 50px;
}
</style>
