import {request} from './request'

export function checkAuth() {
    return new Promise(async resolve => {
        const res = await request.get('/checkAuth');
        console.log(res);
        resolve();
    })
}