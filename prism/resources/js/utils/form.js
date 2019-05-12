
export function setFiledsWithErrors (form, errors) {
  const filedValues = Object.assign({}, form.getFieldsValue())
  const fields = {}
  Object.keys(filedValues).forEach(key => {
    fields[key] = {
      value: filedValues[key],
      errors: errors.hasOwnProperty(key) ? errors[key].map((msg) => {
        return new Error(msg)
      }) : undefined
    }
  })
  form.setFields(fields)
}
