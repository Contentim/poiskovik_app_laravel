<template>
  <div>
    <div id="dropdown" />
    <div class="flex flex-col">
      <div class="flex flex-col h-screen">
        <div class="flex flex-grow overflow-y-auto" scroll-region>
          <main-menu class="flex flex-col justify-between content-center flex-shrink-0 p-3 w-56 bg-white overflow-y-auto border-r-4" scroll-region/>
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import Dropdown from '@/Shared/Dropdown'
import MainMenu from '@/Shared/Vertical/MainMenu'

export default {
  components: {
    Dropdown,
    Icon,
    Link,
    Logo,
    MainMenu,
  },
  props: {
    auth: Object,
  },
  data() {
    return {
      tab: 'editor',
      menu_trigger: false,
      menu_editor: true,
      menu_explorer: false,
    }
  },
  methods: {
    
  }
}
</script>
