# pull official base image
FROM node:14-alpine

# set working directory
# WORKDIR ./

# add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH

# add app
COPY . ./
RUN yarn install
RUN yarn global add react-scripts@latest

# exposes the port used by react
EXPOSE 3000
