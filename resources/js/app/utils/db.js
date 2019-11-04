import low from 'lowdb';
import LocalStorage from 'lowdb/adapters/LocalStorage';
import cookies from '@/utils/cookies'
import { cloneDeep } from 'lodash';

const adapter = new LocalStorage('dawn');
const database = low(adapter);

/**
 * @description 检查路径是否存在 不存在的话初始化
 * @param {Object} dbName {String} 数据库名称
 * @param {Object} path {String} 路径
 * @param {Object} user {Boolean} 区分用户
 * @param {Object} validator {Function} 数据校验钩子 返回 true 表示验证通过
 * @param {Object} defaultValue {*} 初始化默认值
 * @returns {String} 可以直接使用的路径
 */
function pathInit ({
    dbName = 'database',
    path = '',
    user = true,
    validator = () => true,
    defaultValue = ''
}) {
    const uuid = cookies.get('uuid') || 'ghost-uuid';
    const currentPath = `${dbName}.${user ? `user.${uuid}` : 'public'}${path ? `.${path}` : ''}`;
    const value = database.get(currentPath).value();

    if (!(value !== undefined && validator(value))) {
        database.set(currentPath, defaultValue).write();
    }
    return currentPath;
}

database
    .defaults({
        sys: {},
        database: {},
        auth: {}
    })
    .write();

const db = {
    /**
     * @description 将数据存储到指定位置 | 路径不存在会自动初始化
     * @description 效果类似于取值 dbName.path = value
     * @param context context
     * @param {Object} dbName {String} 数据库名称
     * @param {Object} path {String} 存储路径
     * @param {Object} value {*} 需要存储的值
     * @param {Object} user {Boolean} 是否区分用户
     */
    set (context, {
        dbName = 'database',
        path = '',
        value = '',
        user = false
    }) {
        database.set(pathInit({
            dbName,
            path,
            user
        }), value).write()
    },
     /**
     * @description 获取数据
     * @description 效果类似于取值 dbName.path || defaultValue
     * @param context context
     * @param {Object} dbName {String} 数据库名称
     * @param {Object} path {String} 存储路径
     * @param {Object} defaultValue {*} 取值失败的默认值
     * @param {Object} user {Boolean} 是否区分用户
     */
    get (context, {
        dbName = 'database',
        path = '',
        defaultValue = '',
        user = false
    }) {
        return new Promise(resolve => {
            resolve(cloneDeep(database.get(pathInit({
                dbName,
                path,
                user,
                defaultValue
            })).value()))
        })
    }
}

export default db;
