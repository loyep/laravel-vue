
export function setFiledsWithErrors(form: any, errors: any) {
  const filedValues: object = Object.assign({}, (<any>form).getFieldsValue())
  const fields: object = {}
  Object.keys(filedValues).forEach(key => {
    fields[key] = {
      value: filedValues[key],
      errors: errors.hasOwnProperty(key) ? errors[key].map((msg: string) => {
        return new Error(msg);
      }) : undefined
    }
  })
  form.setFields(fields)
}