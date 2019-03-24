
export function setFiledsWithErrors(form: any, errors: any) {
  const filedValues: Object = Object.assign({}, (<any>form).getFieldsValue())
  const fields: Object = {}
  Object.keys(filedValues).forEach(key => {
    fields[key] = {
      value: filedValues[key],
      errors: errors.hasOwnProperty(key) ? errors[key].map(msg => {
        return new Error(msg);
      }) : undefined
    }
  })
  form.setFields(fields)
}