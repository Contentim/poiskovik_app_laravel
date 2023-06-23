import { createEditor } from 'vueditor'
import 'vueditor/dist/style/vueditor.min.css'

const editor = createEditor('#editorContainer', {
    toolbar: [
      'removeFormat', 'undo', '|', 'elements', 'fontName', 'fontSize', 'foreColor', 'backColor', 'divider',
      'bold', 'italic', 'underline', 'strikeThrough', 'links', 'divider', 'subscript', 'superscript',
      'divider', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', '|', 'indent', 'outdent',
      'insertOrderedList', 'insertUnorderedList', '|', 'picture', 'tables', '|', 'switchView'
    ],
    fontName: [
      {val: 'arial black'}, 
      {val: 'times new roman'}, 
      {val: 'Courier New'}
    ],
    fontSize: [
      '12px', '14px', '16px', '18px', '20px', '24px', '28px', '32px', '36px'
    ],
    uploadUrl: '',
    id: '',
    classList: []
});

export default editor