import { createPinia } from 'pinia';

export const pinia = createPinia();

// Example store
export const useMyStore = pinia.defineStore('myStore', {
  state: () => ({
    message: 'Hello from Pinia!',
  }),
});
